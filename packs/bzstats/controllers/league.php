<?php

/**
 * Various league-related information
 *
 * @author kongr45gpen
 */
class LeagueController extends \Qore\Controller {
    /**
     *
     * @var \Packs\Bzstats\Models\Statsmodel
     */
    private $db;

    /**
     * our constructor - make sure we call the parent's constructor!
     */
    public function __construct() {
        parent::__construct();

        //build the time strings that we need for all the queries
        //all SQL queries are passed GMT times
        //since the dates are all GMT in the DB
        //we pass $this->timezone setting to the DB, and the DB is responsible for timezone conversion
        date_default_timezone_set('GMT');

        $now = time();
        $min5 = 60*5; //5 minutes in seconds

        $this->curStart = date("Y-m-d H:i:s", $now-$min5);
        $this->end = date("Y-m-d H:i:s", $now);

        //grab a connection to our database
        $this->db = \Qore\IoC::Get('bzstats.statsmodel');
    }

    public function __pre() {
        parent::__pre();
        $this->setExecutionState(true);
    }

    public function main_public(array $args) {
        $players = array(
            'agron' => array('team' => 'Sugar'),
            'brad' => array('team' => 'Sugar'),
            'Chestal' => array('team' => 'Oscar'),
            'Constitution' => array('team' => 'Queen'),
            'etigah' => array('team' => 'Oscar'),
            'Mopar Madness' => array('team' => 'Lima'),
            'osta' => array('team' => 'Roger'),
            'slime' => array('team' => 'Queen'),
            'Slyther366' => array('team' => 'Thomas'),
            'quantum dot' => array('team' => 'Lima')
        );

        // Add player status
        foreach ($players as $name => &$data) {
            $data['servers'] = $this->db->getPlayerCurrentServers($name, $this->curStart, $this->end);
        }

        // Sort by team name
        uasort($players, function($val1, $val2) {
            // Players with no team are last
            if (!isset($val1['team'])) {
                return 1;
            } elseif (!isset($val2['team'])) {
                return -1;
            }

            return -strnatcasecmp($val1['team'], $val2['team']);
        });

        echo $this->twig->render('leagueOvso2014.html.twig', array(
            'players' => $players
        ));
    }
}
