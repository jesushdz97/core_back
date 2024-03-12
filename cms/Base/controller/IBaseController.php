<?php

namespace Cms\Base\controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IBaseController
{
    public function index(): JsonResponse;
    public function show(int $id): JsonResponse;
    public function store(Request $request): JsonResponse;
    public function update(Request $request, int $id): JsonResponse;
    public function destroy(int $id): JsonResponse;
}
