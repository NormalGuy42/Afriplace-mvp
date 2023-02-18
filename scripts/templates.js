//Variables
let price;
let title;
let description;
let bedNum;
let bathNum;
let surface;
let location;
let link;
let image;
//Specific variable for ProperttyView
let ownerName;
let ownerTitle;
let amenities;
//Templates
var propertyCard = `
<li>
<div class="result_box">
    <a href="${link}" class="result_link">
        <div class="thumb">
            <img src="${image}" class="">
        </div>
        <div class="info_container">
            <h3 class="prix">${price}</h3>
            <div class="flex_container">
                <div class="flex">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350">
                            <g id="svgg">
                                <path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
                                327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,
                                182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
                                159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd">
                                </path>
                            </g>
                        </svg>${location}</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                            <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                            fill="#afa7a7">
                            </path>
                        </svg>${bedNum}</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                            <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                            2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                            4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                            </path></svg>${bathNum}</span>
                    <span><!--<i class="fas fa-square"></i>-->
                        <svg width="20" height="20">
                            <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                        </svg>${surface}<sup>2</sup></span>
                </div>
            </div>
            <div class="text">
                <h4>${title}</h4>
                <p>${description}</p>
            </div>
        </div>
        <div class="btn search">
            <a href="${link}" class="btn">voir le bien</a>
        </div>
    </a>
</div>
</li>
`;

var propertyCardNew = `
<div class="box">
<div class="thumb">
    <img src="assets/living.jpg">
</div>
<div class="info_container">
    <h3 class="prix">${price}</h3>
<div class="flex_container">
    <div class="flex">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0, 0, 300,350"><g id="svgg"><path id="path0" d="M182.422 59.315 C 134.494 
            69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
            327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 
            162.580 C 301.492 101.835,242.880 46.696,182.422 59.315 M210.156 101.591 C 247.465 
            109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
            159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" 
            fill-rule="evenodd"></path></g></svg> ${location}
        </span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
            <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v
            -4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" fill="#afa7a7">
            </path></svg> ${bedNum}
        </span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
            <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 
            0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 
            2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 
            1 4.675 4.675v5.952z" fill="#afa7a7"/></svg> ${bathNum}
        </span>
        <span>
            <svg width="20" height="20"><rect y="6"height="14" width="16" fill="#afa7a7"></rect></svg> 
            ${surface}<sup>2</sup>
        </span>
    </div>
</div>
<div class="text">
    <h4>${title}</h4>
<p>${description}</p>
</div>
</div>
<div class="btn">
    <a href="viewproperty.html" class="btn">voir le bien</a>
</div>
</div>
`;
var adminPropertyCard = `
<li>
    <div class="property_box">
        <a href="property.html">
            <img src="${image}">
            <div class="property_info">
                <div class="property_stats">
                    <!--Location-->
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0, 0, 300,350">
                            <g id="svgg">
                                <path id="path0" d="M182.422 59.315 C 134.494 69.319,102.262 112.788,107.757 160.012 C 111.741 194.248,141.545 254.972,190.018 
                                327.613 L 199.842 342.335 203.227 337.378 C 250.833 267.672,286.972 196.664,292.191 162.580 C 301.492 101.835,242.880 46.696,
                                182.422 59.315 M210.156 101.591 C 247.465 109.777,261.872 155.348,235.910 183.051 C 208.562 212.232,160.123 198.586,151.861 
                                159.375 C 144.750 125.629,176.460 94.198,210.156 101.591 " stroke="none" fill="#afa7a7" fill-rule="evenodd">
                                </path>
                            </g>
                        </svg>${location}
                    </span>
                    <!--Beds-->
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 25">
                            <path d="M9.196 14.603h15.523v.027h1.995v10.64h-3.99v-4.017H9.196v4.017h-3.99V6.65h3.99v7.953zm2.109-1.968v-2.66h4.655v2.66h-4.655z" 
                            fill="#afa7a7">
                            </path>
                        </svg> ${bedNum}
                    </span>
                    <!--Baths-->
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                            <path d="M23.981 15.947H26.6v1.33a9.31 9.31 0 0 1-9.31 9.31h-2.66a9.31 9.31 0 0 1-9.31-9.31v-1.33h16.001V9.995a2.015 
                            2.015 0 0 0-2.016-2.015h-.67c-.61 0-1.126.407-1.29.965a2.698 2.698 0 0 1 1.356 2.342H13.3a2.7 2.7 0 0 1 1.347-2.337 
                            4.006 4.006 0 0 1 3.989-3.63h.67a4.675 4.675 0 0 1 4.675 4.675v5.952z" fill="#afa7a7">
                            </path></svg> ${bathNum}
                    </span>
                    <!--Surface-->
                    <span>
                        <svg width="20" height="20">
                            <rect y="6" height="14" width="16" fill="#afa7a7"></rect>
                        </svg> ${surface}<sup>2</sup>
                    </span>
                </div>
                <h4>${title}</h4>
                <p>${description}</p>
            </div>
        </a>
        <button  class="more_actions">⋮</button>
        <div class="btn_section">
            <label>Delete</label>
            <label>Hide</label>
        </div>
    </div>
</li>
`;

var viewProperty = `
<section>
        <div class="property_container">
            <div class="exit_arrow">
            </div>
            <div class="img_containers" data-slide-container>
                <a href="fullscreen.html">
                    <ul data-slides>
                        <li class="slide" data-active><img src="${image}" alt=""></li>
                        <li class="slide"><img src="${image}" alt=""></li>
                        <li class="slide"><img src="${image}" alt=""></li>
                    </ul>
                </a>
                <a href="fullscreen.html"class="more_photos">
                    <button><span id="current_img">1</span> sur <span id="total_img">30</span></button>
                </a>
                <button class="slide-btn prev" data-slide-btn="prev">
                    <svg viewBox="0 0 32 32" 
                        class="chevron left" 
                        aria-hidden="true" focusable="false" role="img"><title>Chevron Left</title>
                        <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 2.83l12 
                        12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path>
                    </svg>
                </button>
                <button class="slide-btn next" data-slide-btn="next">
                    <svg viewBox="0 0 32 32" 
                        class="chevron right" 
                        aria-hidden="true" focusable="false" role="img"><title>Chevron Right</title>
                        <path stroke="none" d="M29.41 8.59a2 2 0 00-2.83 0L16 19.17 5.41 8.59a2 2 0 00-2.83 2.83l12 
                        12a2 2 0 002.82 0l12-12a2 2 0 00.01-2.83z"></path>
                    </svg>
                </button>
            </div>  
            <div class="adress"><span>${location}</span></div>  
            <div class="property_info">
                <div class="column price">
                    <div class="column_row price">${price}</div>
                    <label class="price_label">Prix</label>
                </div>
                <div class="column">
                    <div class="column_row">${bedNum}</div>
                    <label>Lits</label>
                </div>
                <div class="column">
                    <div class="column_row">${bathNum}</div>
                    <label>Toilettes</label>
                </div>
                <div class="column">
                    <div class="column_row">${surface}<sup>2</sup></div>
                    <label>Surface</label>
                </div>
            </div>   
            <div class="property_details">
                <div class="details_box">
                    <div class="description">
                        <h3>Description</h3>
                        <div class="line"></div>
                        <p>${description}
                        </p>
                    </div>
                    <div class="installation">
                        <h3>Installations</h3>
                        <div class="line"></div>
                        <ul class="installation_list"> 
                            <li>${amenities}</li>
                            <li>${amenities}</li>
                            <li>${amenities}</li>
                            <li>${amenities}</li>
                        </ul>
                    </div>
                    <div class="contact_title">
                        <h3>Contact</h3>
                    </div>
                </div>
                <div class="contact_box">
                    <div class="contact_info">
                        <img src="assets/user-pfp.png">
                        <h3>${ownerName}</h3>
                        <label>${ownerTitle}</label>
                        <button class="contact_btn">Mettre en contact</button>
                    </div>
                </div>
            </div>
            <div class="mobile_contact_box">
                <div class="contact_id">
                    <label>${ownerName}</label>
                    <p>${ownerTitle}</p>
                </div>
                <button class="contact_btn">Mettre en contact</button>
            </div>
        </div>
    </section>
`;
