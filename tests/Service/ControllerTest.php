<?php
// tests/Service/Service.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Monolog\Logger;

class ControllerTest extends WebTestCase
{
    public function test_execute_task()
    {
        $client = static::createClient();

        $url = '/lucky/number';

        $logger = new Logger('Test');
        $logger->info('Controller test execute task request'
            . ' url: ' . $url
        );

        $crawler = $client->request('GET', $url);
        $response = $client->getResponse();

        $error = null;
        if (!$response->isSuccessful()) {
            $logger->info('Cometido Controller test execute task isSuccessful'
                . ' $response->isSuccessful()' . json_encode($response->isSuccessful())
            );
            $block = $crawler->filter('div.text_exception > h1');
            $logger->info('Cometido Controller test execute task block'
                . ' block: ' . json_encode(var_dump($block))
            );
            if ($block->count()) {
                $error = $block->text();
            }
        }

        $logger->info('Cometido Controller test execute task request'
            . ' error: ' . json_encode($error)
            . ' $response->isSuccessful()' . json_encode($response->isSuccessful())
        );

        $expected = 200;
        $actual = $response->getStatusCode();
        $this->assertEquals($expected, $actual);
    }
}
