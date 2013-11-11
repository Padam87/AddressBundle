<?php

\Locale::setDefault('en');

if (!is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
    throw new \LogicException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');
}

require $autoloadFile;

require_once __DIR__ . '/../vendor/jms/di-extra-bundle/JMS/DiExtraBundle/Annotation/Service.php';
require_once __DIR__ . '/../vendor/jms/di-extra-bundle/JMS/DiExtraBundle/Annotation/Inject.php';
require_once __DIR__ . '/../vendor/jms/di-extra-bundle/JMS/DiExtraBundle/Annotation/InjectParams.php';