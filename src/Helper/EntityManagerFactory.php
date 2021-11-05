<?php

namespace Rafael\Magazord\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(){
        $rootDir = __DIR__ . '/../../src';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir],
            true, null, null, false
        );
        $connection = [
            'url' => "mysql://root:@localhost/magazord"
        ];

        return EntityManager::create($connection, $config);
    }

}
