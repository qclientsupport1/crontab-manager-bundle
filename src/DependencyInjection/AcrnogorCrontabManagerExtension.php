<?php

namespace Acrnogor\CrontabManagerBundle\DependencyInjection;

use Acrnogor\CrontabManagerBundle\Manager\CrontabManager;
use QAlliance\CrontabManager\Writer;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class AcrnogorCrontabManagerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $definitionJobs = new Definition(CrontabManager::class);
        $definitionJobs->setArgument(0, $container->getDefinition(Writer::class));
        $definitionJobs->setArgument(1, $config['cron_jobs']);
        $container->setDefinition('acrnogor_crontab_manager.manager.crontab', $definitionJobs);
    }
}
