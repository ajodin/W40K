<?php

	session_start();
	require("includes/Dice.class.php");
	require("includes/Game.class.php");
	require("includes/Player.class.php");
	require("includes/Ship.class.php");
	require("includes/Frigate.class.php");

	Game::$verbose = TRUE;
	Player::$verbose = TRUE;
	Ship::$verbose = TRUE;

	$ships_p1	= array (
					new Frigate(array ('name' => 'bateau de Raf1', 'x' => 0, 'y' => 0, 'dir' => Game::NORTH)),
					new Frigate(array ('name' => 'bateau de Raf2', 'x' => 50, 'y' => 20, 'dir' => Game::EAST)),
				);

	$ships_p2	= array (
					new Frigate(array ('name' => 'bateau de Raf3', 'x' => 20, 'y' => 3, 'dir' => Game::NORTH)),
					new Frigate(array ('name' => 'bateau de Raf4', 'x' => 10, 'y' => 40, 'dir' => Game::EAST)),
				);

	$player1	= array (
					"id" => 1,
					"name" => "Tommy",
					"ships" => $ships_p1
				);

	$player2	= array (
					"id" => 2,
					"name" => "Anthony",
					"ships" => $ships_p2
				);

	$game = new Game;

	$p1 = $game->add_player($player1);
	$p2 = $game->add_player($player2);

	$game->add_ship('1', $p1->getShips());
	$game->add_ship('2', $p2->getShips());

	echo '<h1><a href="main.php?preset=select&i=0&j=0">Let\'s kick some ass !</a></h1>';
	$player1 = serialize($p1);
	$player2 = serialize($p2);
	$save = serialize($game);
	$_SESSION['save'] = $save;
	$_SESSION['player1'] = $player1;
	$_SESSION['player2'] = $player2;

?>
