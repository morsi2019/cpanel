<?php

namespace App\Http\View\Composers;

use App\Repositories\CountryRepository;
use Illuminate\View\View;

class CountriesComposer
{
    /**
     * The country repository implementation.
     *
     * @var countryRepository
     */
    protected $countries;

    /**
     * Create a new profile composer.
     *
     * @param  countryRepository  $countries
     * @return void
     */
    public function __construct(countryRepository $countries)
    {
        // Dependencies automatically resolved by service container...
        $this->countries = $countries;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->countries->count());
    }
}
