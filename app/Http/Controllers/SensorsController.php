<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/**
 * Class SensorsController
 * @package App\Http\Controllers
 */
class SensorsController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of sensors.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sensors = Sensor::paginate(20);
        return $this->successResponse($sensors, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'x_axis' => 'required|numeric|gte:0|max:800|bail',
            'y_axis' => 'required|numeric|gte:0|max:600|bail'
        ]);
        $sensor = Sensor::create($request->all());
        return $this->successResponse($sensor, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $sensor = Sensor::findOrFail($id);
        return $this->successResponse($sensor, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'x_axis' => 'sometimes|required|numeric|gte:0|max:800|bail',
            'y_axis' => 'sometimes|required|numeric|gte:0|max:600|bail'
        ]);
        $sensor = Sensor::findOrFail($id);
        $sensor->update($request->all());
        return $this->successResponse($sensor, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        return $this->successResponse($sensor, Response::HTTP_NO_CONTENT);
    }

    /**
     * Display a listing of the nearby sensors.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getNearbySensors(Request $request, $id)
    {
        $this->validate($request, [
            'sensor_limit' => 'nullable|integer|gt:0|max:100|bail',
            'max_distance' => 'nullable|integer|gt:0|max:800|bail'
        ]);
        $sensor_limit = $request->get('sensor_limit', 100);
        $max_distance = $request->get('max_distance', 800);
        $sensor = Sensor::findOrFail($id);
        $nearby_sensors = Sensor::nearby($id, $max_distance, $sensor_limit);
        return $this->successResponse(['sensor' => $sensor, 'nearby_sensors' => $nearby_sensors], Response::HTTP_OK);
    }
}
