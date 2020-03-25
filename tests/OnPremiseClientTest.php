<?php

namespace DelaneyMethod\Sharepoint\Test;

use DelaneyMethod\Sharepoint\OnPremiseClient;
use PHPUnit\Framework\TestCase;

class OnPremiseClientTest extends TestCase {
    /**
     * @var OnPremiseClient $client
     */
    private $client = null;

    public function setUp() {
        $this->client = new OnPremiseClient([
            'siteUrl' => 'https://edossier-test.mob.ch/',
            'client' => [
                'verify' => true,
                'curl' => [
                    CURLOPT_HTTPAUTH => CURLAUTH_NTLM,
                    CURLOPT_USERPWD => 'gps\\ed_test_service:pZl=mG,jtrY=.OvI=!+a'
                ]
            ]
        ]);
    }

    public function testCreateFolder()
    {
        $folders = $this->client->createFolder('Test folder');
        $this->assertNotEmpty($folders);
    }


    public function testListFolder()
    {
        $folders = $this->client->listFolder('');
        $this->assertNotEmpty($folders);
    }

}
