# dev-codetest

# Setup 

## Once code is pulled have to do the following
- `composer install`
- `php artisan key:config`
- `php artisan serve`
- Project is based on php 8.1 and Laravel 9.*
- run `php artisan test` to execute tests

## Notes about what was done.

  - Most calculations and logic can be found in `App\Services`:
  - There is one service to handle uploaded files called `FileParserService`. It's only purpose is to produce collection of `AffiliateGeoPositionGto` from entries.
  - To calculate distances to the office called `DistanceCalculationService`. It's used to calculate distance from office.
  - In `DistanceFormulas` can find multiple formulas that can be used to calculate distance. Injection in the application depends on `SurfaceDistanceFormulaInterface` and which one is bound in `AppServiceProvider`
  - `SurfaceDistanceFormulaInterface` depends on Vector interface in `App\Models\Dtos` namespace (kept it in the separate sub-namespace since it's not really db related)
  - Vector` interface has four methods:
  -`getLatitude` and `getLongitude` ar plain getters;
  -`lambda` and `phi` are there to ease calculations when applying formulas - they return lat, lng in Radians.
  - This getter implementation can be found in `FunctionPlugTrait` and it all comes together in `AffiliateGeoPositionGto`
  - `AffiliateEntryDto` extends `AffiliateGeoPositionGto` and adds properties to store additional data.
  - `AffiliateGeoPositionGto` implements `DistanceInterface`, because these records have to be ordered and that is done via Collections macros:
    - `sortByRadius` which allows sorting by radius
    - `withinRadius` - filters based on given limit
    - Both macros can be found in `AppServiceProvider`
  - There's one controller and two routes - one to show form and the other one shows form and table.


Thank You

# Assignment Requirements

Gambling.com Group Dev Code Test


Gambling.com Groups Irish office is in Dublin, where the best minds come together to solve Technical problems.



The JSON-encoded affiliates.txt file attached contains a shortlist of affiliate contact records - one per line.



We want to invite any affiliate that lives within 100km of our Dublin office for some food and drinks using this text file as the input (without being altered).



##Task

Write a program that will read the full list of affiliates from this txt file and output the name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending).



You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.



The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.



You can find the affiliate list in this repository called affiliates.txt.



Please don’t forget, your code should be production ready, clean and tested!


## Nice to haves:

- Demonstrate understanding of MVC

- Unit Tests

- Basic HTML output

- Usage of a PHP Framework (We're a Laravel based company so bonus points for using that)

- Use the original txt file as input 
