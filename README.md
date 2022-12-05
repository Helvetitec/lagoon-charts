# Lagoon Charts
Google Charts for Laravel Livewire

**Do not use this library, it is heavily on work and only used for testing...**


## Requirements

* Laravel 9+
* Livewire 2+

## Installation

Add to composer.json
```
"require": {
    //Other dependencies
    "helvetiapps/lagoon-charts": "^0.1"
},
"repositories": [
        {
            "url": "https://github.com/daredloco/lagoon-charts.git",
            "type": "git"
        }
]
```


## Included Charts

* Line Charts (Preview)
* Pie Charts (Preview)


## TODO

* Add HTML Tooltips as custom class
* Add all types of Charts
* Add an easier way to add data etc.
* Add an easier way to add/edit options


## Usage

TODO

### Line Chart

Data
```php
$data = [];
```

Blade
```
@livewire('lagoon-line-chart', ['chartId' => 'uniqueId', 'chartData' => $data, 'title' => 'Title'], key('unique'.now()))
```


### Pie Chart

Data
```php
//Set title as first values
$data = ['Day', 'Value'];

//Add other data
array_push($data, [1,250]);
array_push($data, [2,650]);
array_push($data, [3,400]);
```

Blade
```
@livewire('lagoon-pie-chart', ['chartId' => 'uniqueId', 'chartData' => $data, 'title' => 'Title'], key('unique'.now()))
```