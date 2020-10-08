<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;

class SensorsTest extends TestCase
{
    const URI = 'sensors';

    public function setUp(): void
    {
        parent::setUp();

        $this->sensor = factory('App\Sensor', 1)->create();
    }

    /** @test */
    public function can_create_a_sensor()
    {
        /** @var \Faker\Generator $faker */
        $faker = app(\Faker\Generator::class);

        $dataBody = [
            'x_axis' => $x_axis = $faker->numberBetween(0, 800),
            'y_axis' => $y_axis = $faker->numberBetween(0, 600)
        ];

        $response = $this->json('POST', self::URI, $dataBody, []);
        $response->assertResponseStatus(Response::HTTP_CREATED);
        $response->seeJsonStructure([
            'data' =>
                ['id', 'x_axis', 'y_axis', 'updated_at', 'created_at']
            ]
        );
    }

    /** @test */
    public function fail_with_a_404_if_sensor_not_found()
    {
        $response = $this->json('GET', self::URI . '/-1');
        $response->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function can_return_a_sensor()
    {
        $response = $this->json('GET', self::URI . '/' . $this->sensor[0]->id, [], []);

        $response->assertResponseStatus(Response::HTTP_OK);
        $response->seeJsonStructure(
            ['data' =>
                ['id', 'x_axis', 'y_axis', 'updated_at', 'created_at']
            ]);
    }

    /** @test */
    public function fail_with_404_if_sensor_we_want_to_updated_is_not_fount()
    {
        $response = $this->json('PUT', self::URI . '/-1');
        $response->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function can_update_a_sensor()
    {
        /** @var \Faker\Generator $faker */
        $faker = app(\Faker\Generator::class);

        $dataBody = [
            'x_axis' => $x_axis = $faker->numberBetween(0, 800),
            'y_axis' => $y_axis = $faker->numberBetween(0, 600)
        ];

        $response = $this->json('PUT', self::URI . '/' . $this->sensor[0]->id, $dataBody, []);
        $response->assertResponseStatus(Response::HTTP_OK);
        $response->seeJsonStructure(
            ['data' =>
                ['id', 'x_axis', 'y_axis', 'updated_at', 'created_at']
            ]);
    }

    /** @test */
    public function fail_with_404_if_sensor_we_want_to_delete_is_not_fount()
    {
        $response = $this->json('DELETE', self::URI . '/-1');
        $response->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function can_delete_a_sensor()
    {
        $response = $this->json('DELETE', self::URI . '/110', [], []);
        $response->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function can_return_a_collection_of_paginate_sensors()
    {
        $response = $this->json('GET', self::URI, [], []);

        $response->assertResponseStatus(Response::HTTP_OK);
        $response->assertResponseOk();
        $response->seeJsonStructure(
            ['data' =>
                [
                    'data' => [
                        '*' =>
                            ['id', 'x_axis', 'y_axis', 'updated_at', 'created_at']
                    ],
                    'first_page_url',
                    'from',
                    'last_page_url',
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total'
                ]
            ]
        );
    }

    /** @test */
    public function can_return_a_sensor_with_nearby_sensors_with_him()
    {
        factory(\App\Sensor::class, 100)->create();

        /** @var \Faker\Generator $faker */
        $faker = app(\Faker\Generator::class);

        $dataBody = [
            'sensor_limit' => $x_axis = $faker->numberBetween(0, 100)
        ];

        $response = $this->json('GET', self::URI . '/' . $this->sensor[0]->id . '/nearby', $dataBody, []);
        $response->assertResponseStatus(Response::HTTP_OK);
        $response->seeJsonStructure(
            ['data' =>
                [
                    'sensor' => [
                        'id', 'x_axis', 'y_axis', 'updated_at', 'created_at'
                    ],
                    'nearby_sensors' => [
                        '*' => [
                            'id', 'x_axis', 'y_axis', 'updated_at', 'created_at', 'distance'
                        ]
                    ]
                ]
            ]
        );

    }
}
