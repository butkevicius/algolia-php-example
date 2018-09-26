# Algolia PHP Example 

## SDK example
 
1. Install dependecies `composer install`
2. Copy `.env.example` to `.env` and enter Aloglia credentials
2. Push data and configure index `php push_data.php` 
3. Search `php simple-search.php john`

## Instant search example

1. Create index `instant_search_example_local`
2. Download `https://github.com/algolia/datasets/raw/master/ecommerce/records.json` and upload new records
3. Configure
    - Searchable attributes:
        - brand
        - name
        - categories
        - unordered(description)
    - customRanking:
        - desc(popularity)
    - Attributes for faceting
        - searchable(brand)
        - type
        - categories
        - price
4. Copy `public/env.js.example` to `public/env.js` and enter Algolia credentials 
5. Run `php -S localhost:8000 -t public` and open http://localhost:8000
