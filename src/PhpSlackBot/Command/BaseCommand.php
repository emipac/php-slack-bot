<?php
namespace PhpSlackBot\Command;

abstract class BaseCommand extends \PhpSlackBot\Base {

    public function executeCommand($message, $context) {
        return $this->execute($message, $context);
    }

    public function getArgs($message) {
        $args = array();
        if (isset($message['text'])) {
            $args = array_values(array_filter(explode(' ', $message['text'])));
        }
        $commandName = $this->getName();
        // Remove args which are before the command name
        $finalArgs = array();
        $remove = true;
        foreach ($args as $arg) {
            if ($commandName == $arg) {
                $remove = false;
            }
            if (!$remove) {
                $finalArgs[] = $arg;
            }
        }
        return $finalArgs;
    }
}
