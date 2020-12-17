<?php

namespace App\Http\Middleware;

use App\Repositories\FeatureRepository;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    protected $feature;
    public function __construct(FeatureRepository $feature)
    {
        $this->feature = $feature;
    }

    public function handle(Request $request, Closure $next)
    {
        $features = $this->feature->search(new Request(['parent_code' => '#']));
        $features = $this->feature->nested_data($features);
        view()->share(['features' => $features]);
        return $next($request);
    }
}
