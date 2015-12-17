<?php

  namespace applqpak\CommandAliases;

  use pocketmine\utils\TextFormat as Colour;
  use pocketmine\plugin\PluginBase;
  use pocketmine\command\CommandExecutor;
  use pocketmine\command\CommandSender;
  use pocketmine\command\Command;
  use pocketmine\command\ConsoleCommandSender;

  class CommandAliases extends PluginBase {

    public function __construct(ServerAPI $api, $server = false) {
      $this->api = $api;
    }

    public function onLoad() {

      $this->getLogger()->info("CommandAliases Version 2.0.0 by applqpak was Loaded!");

    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {

      if(strtolower($command->getName()) === "cmdalias") {
        if($args < 2) {

          $sender->sendMessage(Colour::RED . "Please specify an alias and a command. Usage: /cmdalias <alias> <command> E.G. /cmdalias h help");

        } else {

          $this->api->console->alias($args[0], $args[1]);
          $sender->sendMessage(Colour::GREEN . "Successfully set alias for command: " . Colour::Yellow . $args[1] . Colour::GREEN . "!");
          
          return true;

        }
        
      }
      
      return false;

    }

  //}

    public function onJoin(\pocketmine\event\player\PlayerJoinEvent $event) {

      $player = $event->getPlayer();
      $name = $player->getName();

      $player->sendMessage(Colour::GREEN . "Welcome, " . Colour::YELLOW . $name . Colour::GREEN . ". I made my server awesome with the CommandAliases Plugin by applqpak! Check him out on Twitter @applqpak1");
      $player->sendTip(Colour::GREEN . "Hello, " . Colour::YELLOW . $name . Colour::GREEN . "!");

    }

  }

?>
