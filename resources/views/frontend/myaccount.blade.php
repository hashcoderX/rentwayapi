<style>
    /* Small devices */
    @media (max-width: 575.98px) {
        .adsviewsection {
            display: block;
            width: 100%;
        }

        .locations_container {

            display: none;

        }

        .sepadssec {
            display: block;
        }
    }

    /* Tablets */
    @media (min-width: 576px) and (max-width: 991.98px) {
        .adsviewsection {
            display: block;
            width: 100%;
        }

        .locations_container {

            display: none;

        }

        .sepadssec {
            display: block;
        }

        .modal-dialog {
            max-width: 80%;
        }


    }

    /* Surface Pro and Small laptops */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .adsviewsection {
            display: block;
            width: 100%;
        }

        .locations_container {

            display: none;

        }

        .sepadssec {
            display: block;
        }
    }

    /* Big Laptops */
    @media (min-width: 1200px) {
        .adsviewsection {
            display: block;
        }

        .locations_container {
            width: auto;
        }

        .sepadssec {
            display: block;
        }
    }
</style>

<style>
    .location-list,
    .nested-list {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
    }

    .nested-list {
        display: none;
        padding-left: 15px;
        margin-top: 5px;
    }

    .location-toggle {
        cursor: pointer;
        display: inline-block;
        padding: 5px 0;
        color: #333;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .location-toggle:hover {
        color: #007bff;
    }

    .nested-list li {
        padding: 2px 0;
        color: #555;
        font-size: 14px;
    }

    .location-list li {
        padding-top: 20px;
    }
</style>



<x-frontend-app-layout>
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 locations_container">
                    <div class="product__price-ranger product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">

                        <ul class="location-list">

                            <li>
                                <strong>
                                    <label onclick="loadSubPage('myads')">My Ads</label>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <label onclick="loadSubPage('mymembership')"> My Membership</label>
                                </strong>
                            </li>

                            <li>
                                <strong>
                                    <label onclick="loadSubPage('setting')"> Setting</label>
                                </strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 adsviewsection" id="adsviewsection">

                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </section>

    @include('frontend.includes.footer')


</x-frontend-app-layout>

<script>
    function loadSubPage(pageName) {
        alert(pageName);
    }
</script>