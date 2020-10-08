<?php

/**
 * Index Swagger Annotation
 * @OA\Get(
 *     path="/sensors",
 *     tags={"Sensors"},
 *     summary="Get sensors list",
 *     description="Return a listing of sensors.",
 *     operationId="index",
 *     @OA\Response(
 *         response=200,
 *         description="sensors overview."
 *     )
 * )
 */


/**
 * Store Swagger Annotation
 * @OA\Post(
 *     path="/sensors",
 *     tags={"Sensors"},
 *     summary="Store a sensor",
 *     description="Store a sensor in storage.",
 *     operationId="store",
 *     @OA\Parameter(
 *         name="x_axis",
 *         in="query",
 *         description="X axis",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="y_axis",
 *         in="query",
 *         description="Y axis",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Sensor created.",
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description=" Unprocessable Entity.",
 *     )
 * )
 */


/**
 * Show Swagger Annotation
 * @OA\Get(
 *     path="/sensors/{id}",
 *     tags={"Sensors"},
 *     summary="Get a sensor info",
 *     description="Show a sensor info.",
 *     operationId="show",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Sensor ID",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sensor overview."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Sensor not found.",
 *     )
 * )
 */


/**
 * Update Swagger Annotation
 * @OA\Put(
 *     path="/sensors/{id}",
 *     tags={"Sensors"},
 *     summary="Update a sensor",
 *     description="Update a sensor.",
 *     operationId="update",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Sensor id",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="x_axis",
 *         in="query",
 *         description="X axis",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="y_axis",
 *         in="query",
 *         description="Y axis",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sensor overview."
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description=" Unprocessable Entity.",
 *     )
 * )
 */


/**
 * Delete Swagger Annotation
 * @OA\Delete(
 *     path="/sensors/{id}",
 *     tags={"Sensors"},
 *     summary="Delete a sensor",
 *     description="Delete sensor.",
 *     operationId="destroy",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Sensor ID",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sensor deleted."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Sensor not found.",
 *     )
 * )
 */


/**
 * Nearby sensors Swagger Annotation
 * @OA\Get(
 *     path="/sensors/{id}/nearby",
 *     tags={"Sensors"},
 *     summary="Get nearby sensors list",
 *     description="Show nearby sensor list.",
 *     operationId="nearby",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Sensor ID",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="sensor_limit",
 *         in="query",
 *         description="Sensor limit to show",
 *         required=false,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="max_distance",
 *         in="query",
 *         description="Scope of maximum distance of sensors",
 *         required=false,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sensor overview."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Sensor not found.",
 *     )
 * )
 */
