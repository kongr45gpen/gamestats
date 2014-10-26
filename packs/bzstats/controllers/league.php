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
            'agron',
            'brad',
            'Chestal',
            'Constitution',
            'etigah',
            'Mopar Madness',
            'slime',
            'Slyther366',
            'quantum dot'
        );


        echo $this->twig->render('leagueOvso2014.html.twig', array(
            'players' => $players
        ));
    }
}
