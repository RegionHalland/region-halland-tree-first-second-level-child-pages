# Hämta aktuell sida + alla barn-sidor

## Hur man använder Region Hallands plugin "region-halland-tree-first-second-level-child-pages"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-tree-first-second-level-child-pages".


## Användningsområde

Denna plugin skapar en array() med aktuell sida + alla barn-sidor


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-tree-first-second-level-child-pages/blob/master/LICENSE)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-tree-first-second-level-child-pages.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-tree-first-second-level-child-pages.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-tree-first-second-level-child-pages": "1.0.0"
},
```


## Loopa ut sidorna via "Blade"

```sh
@if(function_exists('get_region_halland_tree_first_second_level_child_pages'))
  @php($myPages = get_region_halland_tree_first_second_level_child_pages()) 
  @if(isset($myPages) && !empty($myPages['first_page']))
    @if($myPages['first_page']->active == 1)
      <a href="{{ $myPages['first_page']->url }}"><strong>{{ $myPages['first_page']->post_title }}</strong></a>
    @else
      <a href="{{ $myPages['first_page']->url }}">{{ $myPages['first_page']->post_title }}</a>
    @endif
    @if (!empty($myPages['page_children']))
      @foreach ($myPages['page_children'] as $myChilds)
        @if($myChilds->active == 1)
          <a href="{{ $myChilds->url }}"><strong>{{ $myChilds->post_title }}</strong></a>
        @else
          <a href="{{ $myChilds->url }}">{{ $myChilds->post_title }}</a>
        @endif
      @endforeach
    @endif
  @endif
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  'current_page' => 
    object(WP_Post)[6211]
      public 'ID' => int 9
      public 'post_author' => string '1' (length=1)
      public 'post_date' => string '2018-11-21 17:10:33' (length=19)
      public 'post_date_gmt' => string '2018-11-21 16:10:33' (length=19)
      public 'post_content' => string 'Etiam dictum enim eu tortor rhoncus' (length=35)
      public 'post_title' => string 'Etiam dictum enim' (length=17)
      public 'post_excerpt' => string '' (length=0)
      public 'post_status' => string 'publish' (length=7)
      public 'comment_status' => string 'closed' (length=6)
      public 'ping_status' => string 'closed' (length=6)
      public 'post_password' => string '' (length=0)
      public 'post_name' => string 'etiam-dictum-enim' (length=17)
      public 'to_ping' => string '' (length=0)
      public 'pinged' => string '' (length=0)
      public 'post_modified' => string '2018-11-30 16:39:40' (length=19)
      public 'post_modified_gmt' => string '2018-11-30 15:39:40' (length=19)
      public 'post_content_filtered' => string '' (length=0)
      public 'post_parent' => int 0
      public 'guid' => string 'http://exempel.se/?page_id=9' (length=34)
      public 'menu_order' => int 0
      public 'post_type' => string 'page' (length=4)
      public 'post_mime_type' => string '' (length=0)
      public 'comment_count' => string '0' (length=1)
      public 'filter' => string 'raw' (length=3)
      public 'url' => string 'http://exempel.se/etiam-dictum-enim' (length=35)
      public 'active' => int 1
  'page_children' => 
    array (size=2)
      0 => 
        object(WP_Post)[6402]
          public 'ID' => int 25
          public 'post_author' => string '1' (length=1)
          public 'post_date' => string '2018-11-22 11:34:55' (length=19)
          public 'post_date_gmt' => string '2018-11-22 10:34:55' (length=19)
          public 'post_content' => string 'Pretium sed tempor nisl ut accumsan' (length=35)
          public 'post_title' => string 'Pretium sed tempor' (length=18)
          public 'post_excerpt' => string '' (length=0)
          public 'post_status' => string 'publish' (length=7)
          public 'comment_status' => string 'closed' (length=6)
          public 'ping_status' => string 'closed' (length=6)
          public 'post_password' => string '' (length=0)
          public 'post_name' => string 'pretium-sed-tempor' (length=18)
          public 'to_ping' => string '' (length=0)
          public 'pinged' => string '' (length=0)
          public 'post_modified' => string '2018-11-30 16:40:46' (length=19)
          public 'post_modified_gmt' => string '2018-11-30 15:40:46' (length=19)
          public 'post_content_filtered' => string '' (length=0)
          public 'post_parent' => int 9
          public 'guid' => string 'http://exempel.se/vestibulum-ante-ipsum/etiam-pulvinar-felis/' (length=67)
          public 'menu_order' => int 0
          public 'post_type' => string 'page' (length=4)
          public 'post_mime_type' => string '' (length=0)
          public 'comment_count' => string '0' (length=1)
          public 'filter' => string 'raw' (length=3)
          public 'url' => string 'http://exempel.se/etiam-dictum-enim/pretium-sed-tempor/' (length=61)
          public 'active' => int 0
      1 => 
        object(WP_Post)[6403]
          public 'ID' => int 27
          public 'post_author' => string '1' (length=1)
          public 'post_date' => string '2018-11-22 11:35:44' (length=19)
          public 'post_date_gmt' => string '2018-11-22 10:35:44' (length=19)
          public 'post_content' => string 'Aliquam eros elit, mollis a ipsum eu.' (length=37)
          public 'post_title' => string 'Mattis semper nibh' (length=18)
          public 'post_excerpt' => string '' (length=0)
          public 'post_status' => string 'publish' (length=7)
          public 'comment_status' => string 'closed' (length=6)
          public 'ping_status' => string 'closed' (length=6)
          public 'post_password' => string '' (length=0)
          public 'post_name' => string 'mattis-semper-nibh' (length=18)
          public 'to_ping' => string '' (length=0)
          public 'pinged' => string '' (length=0)
          public 'post_modified' => string '2018-11-30 16:43:52' (length=19)
          public 'post_modified_gmt' => string '2018-11-30 15:43:52' (length=19)
          public 'post_content_filtered' => string '' (length=0)
          public 'post_parent' => int 9
          public 'guid' => string 'http://exempel.se/vestibulum-ante-ipsum/duis-eu-odio/' (length=59)
          public 'menu_order' => int 0
          public 'post_type' => string 'page' (length=4)
          public 'post_mime_type' => string '' (length=0)
          public 'comment_count' => string '0' (length=1)
          public 'filter' => string 'raw' (length=3)
          public 'url' => string 'http://exempel.se/etiam-dictum-enim/mattis-semper-nibh/' (length=61)
          public 'active' => int 0
```

## Versionhistorik

### 1.1.0
- Uppdaterat information om licensmodell
- Bifogat fil med licensmodell

### 1.0.0
- Första version