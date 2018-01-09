<?php

namespace Orchid\Platform\Http\Filters;

use Orchid\Platform\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class CreatedFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'start_created_at',
        'end_created_at',
    ];

    /**
     * @var bool
     */
    public $display = true;

    /**
     * @var bool
     */
    public $dashboard = true;

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder) : Builder
    {


        $start = (new Carbon($this->request->get('start_created_at')))
            ->toDateTimeString();
        $end = (new Carbon($this->request->get('end_created_at')))
            ->addDay()
            ->toDateTimeString();
        return $builder
            ->where('created_at', '>=', $start)
            ->where('created_at', '<', $end);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        return view('dashboard::container.posts.filters.created', [
            'request' => $this->request,
        ]);
    }
}
