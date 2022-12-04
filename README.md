# Lagoon Charts
Google Charts for Laravel Livewire


## Usage

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

**Do not use this library, it is heavily on work and only used for testing...**