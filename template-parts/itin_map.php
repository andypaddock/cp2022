<section class="map">
    <div class="row">
        <div class="map-wrapper">
            <div class="daybanner">
                <div class="heading">
                    <h1>Itinerary Map</h1>
                </div>
                <div id="listings" class="listings">
                </div><button id="zoomto" class="btn-control">Zoom to bounds</button>
            </div>
            <div id="map" class="map"></div>
        </div>
    </div>
</section>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5keXBhZGRvY2siLCJhIjoiY2tjb3JnYXo3MGg3aTJ1bGQ3Z3hsY3RkaCJ9.Nuw5WXsnHTCDJhtjXzryUw';

/**
 * Add the map to the page
 */
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [-77.334084142948, 38.909671288923],
    zoom: 13,
    scrollZoom: false
});

const stores = {
    "type": "FeatureCollection",
    "features": [
        <?php if( have_rows('days_plan') ): ?>
        <?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?> {
            'type': 'Feature',
            'geometry': {
                'type': 'Point',
                'coordinates': [<?php echo esc_attr($location['lng']); ?>,
                    <?php echo esc_attr($location['lat']); ?>
                ]
            },
            'properties': {
                'stepname': '<?php the_sub_field('title');?>',
                'description': '<?php the_sub_field('days');?>',
            }
        },

        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>




    ]
};

<?php if( have_rows('days_plan') ): ?>
<?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?>
var origin<?php echo get_row_index(); ?> = [<?php echo esc_attr($location['lng']); ?>,
    <?php echo esc_attr($location['lat']); ?>
];

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

// // San Francisco
// var origin = [-77.034084142948, 38.909671288923];
// // San Francisco
// var origin2 = [-77.049766, 38.900772];

// // Washington DC
// var destination = [-77.043929, 38.910525];

// A simple line from origin to destination.
var route = {
    'type': 'FeatureCollection',
    'features': [{
        'type': 'Feature',
        'geometry': {
            'type': 'LineString',
            'coordinates': [<?php if( have_rows('days_plan') ): ?>
                <?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?>origin<?php echo get_row_index(); ?>,


                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            ]
        }
    }]
};


/**
 * Assign a unique id to each store. You'll use this `id`
 * later to associate each point on the map with a listing
 * in the sidebar.
 */
stores.features.forEach((store, i) => {
    store.properties.id = i;
});

/**
 * Wait until the map loads to make changes to the map.
 */
map.on('load', () => {
    /**
     * This is where your '.addLayer()' used to be, instead
     * add only the source without styling a layer
     */
    map.addSource('places', {
        'type': 'geojson',
        'data': stores
    });
    map.addSource('route', {
        'type': 'geojson',
        'data': route
    });

    map.addLayer({
        'id': 'route',
        'source': 'route',
        'type': 'line',
        'paint': {
            'line-width': 2,
            'line-color': '#707070',
            'line-dasharray': [2, 1],
        }
    });


    buildLocationList(stores);
    addMarkers();


});

var coordinates = [<?php if( have_rows('days_plan') ): ?>
                <?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?>origin<?php echo get_row_index(); ?>,


                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>];

var bounds = coordinates.reduce(function(bounds, coord) {
    return bounds.extend(coord);
}, new mapboxgl.LngLatBounds(coordinates[0], coordinates[0]));

map.fitBounds(bounds, {
    padding: 100
});

/**
 * Add a marker to the map for every store listing.
 **/
function addMarkers() {
    /* For each feature in the GeoJSON object above: */
    for (const marker of stores.features) {
        /* Create a div element for the marker. */
        const el = document.createElement('div');
        /* Assign a unique `id` to the marker. */
        el.id = `marker-${marker.properties.id}`;
        /* Assign the `marker` class to each marker for styling. */
        el.className = 'marker';

        /**
         * Create a marker using the div element
         * defined above and add it to the map.
         **/
        new mapboxgl.Marker(el, {
                offset: [0, -23]
            })
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);

        /**
         * Listen to the element and when it is clicked, do three things:
         * 1. Fly to the point
         * 2. Close all other popups and display popup for clicked store
         * 3. Highlight listing in sidebar (and remove highlight for all other listings)
         **/
        el.addEventListener('click', (e) => {
            /* Fly to the point */
            flyToStore(marker);
            /* Close all other popups and display popup for clicked store */
            createPopUp(marker);


            /* Highlight listing in sidebar */
            const activeItem = document.getElementsByClassName('active');
            e.stopPropagation();
            if (activeItem[0]) {
                activeItem[0].classList.remove('active');
            }
            const listing = document.getElementById(
                `listing-${marker.properties.id}`
            );
        });
    }
}

/**
 * Add a listing for each store to the sidebar.
 **/
function buildLocationList(stores) {
    for (const store of stores.features) {
        /* Add a new listing section to the sidebar. */
        const listings = document.getElementById('listings');
        const listing = listings.appendChild(document.createElement('div'));
        /* Assign a unique `id` to the listing. */
        listing.id = `listing-${store.properties.id}`;
        /* Assign the `item` class to each listing for styling. */
        listing.className = 'item';

        /* Add the link to the individual listing created above. */
        const link = listing.appendChild(document.createElement('h2'));
        link.href = '';
        link.className = 'title';
        link.id = `link-${store.properties.id}`;
        link.innerHTML = `${store.properties.stepname}`;

        /* Add details to the individual listing. */
        const details = listing.appendChild(document.createElement('p'));
        details.innerHTML = `${store.properties.description}`;
        if (store.properties.phone) {
            details.innerHTML += ` &middot; ${store.properties.phoneFormatted}`;
        }

        /**
         * Listen to the element and when it is clicked, do four things:
         * 1. Update the `currentFeature` to the store associated with the clicked link
         * 2. Fly to the point
         * 3. Close all other popups and display popup for clicked store
         * 4. Highlight listing in sidebar (and remove highlight for all other listings)
         **/
        link.addEventListener('click', function() {
            for (const feature of stores.features) {
                if (this.id === `link-${feature.properties.id}`) {
                    flyToStore(feature);
                    createPopUp(feature);
                }
            }
            const activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
                activeItem[0].classList.remove('active');
            }
            this.parentNode.classList.add('active');
        });


    }
}

/**
 * Use Mapbox GL JS's `flyTo` to move the camera smoothly
 * a given center point.
 **/
function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 15
    });
}

/**
 * Create a Mapbox GL JS `Popup`.
 **/
function createPopUp(currentFeature) {
    const popUps = document.getElementsByClassName('mapboxgl-popup');
    if (popUps[0]) popUps[0].remove();
    const popup = new mapboxgl.Popup({
            closeOnClick: false
        })
        .setLngLat(currentFeature.geometry.coordinates)
        .setHTML(
            `<h3>${currentFeature.properties.stepname}</h3><h4>${currentFeature.properties.description}</h4>`
        )
        .addTo(map);
}
</script>