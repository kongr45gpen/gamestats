<?php

/**
 * Various league-related information
 *
 * @author kongr45gpen
 */
class LeagueController extends \Qore\Controller {

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
