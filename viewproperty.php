<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriété</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/viewproperty.css">
    <script src="scripts/script.js" defer></script>
</head>
<body>
   <!--Header end-->
   <?php include('templates/header.php')?>
    <!--Header start-->
    <section>
        <div class="property_container">
            <div class="exit_arrow">
            </div>
            <div class="img_containers" data-slide-container>
                <a href="fullscreen.html">
                    <ul data-slides>
                        <li class="slide" data-active><img src="assets/living.jpg" alt=""></li>
                        <li class="slide"><img src="assets/new-living.jpg" alt=""></li>
                        <li class="slide"><img src="assets/maison.png" alt=""></li>
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
            <div class="adress"><span>Lambagny</span></div>  
            <div class="property_info">
                <div class="column price">
                    <div class="column_row price">5.000.000 GNF</div>
                    <label class="price_label">Prix</label>
                </div>
                <div class="column">
                    <div class="column_row">3</div>
                    <label>Lits</label>
                </div>
                <div class="column">
                    <div class="column_row">2</div>
                    <label>Toilettes</label>
                </div>
                <div class="column">
                    <div class="column_row">750m<sup>2</sup></div>
                    <label>Surface</label>
                </div>
            </div>   
            <div class="property_details">
                <div class="details_box">
                    <div class="description">
                        <h3>Description</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus animi quisquam, accusamus similique quasi 
                            impedit quis 
                            beatae, dolorem reiciendis, obcaecati omnis magnam ipsum dicta laboriosam quidem maxime placeat 
                            recusandae architecto!
                        </p>
                    </div>
                    <div class="installation">
                        <h3>Installations</h3>
                        <div class="line"></div>
                        <ul class="installation_list"> 
                            <li>Meublé</li>
                            <li>Climatisation</li>
                            <li>Meublé</li>
                            <li>Climatisation</li>
                            <li>Meublé</li>
                            <li>Climatisation</li>
                            <li>Meublé</li>
                            <li>Climatisation</li>
                        </ul>
                    </div>
                    <div class="contact_title">
                        <h3>Contact</h3>
                    </div>
                </div>
                <div class="contact_box">
                    <div class="contact_info">
                        <img src="assets/user-pfp.png">
                        <h3>User</h3>
                        <label>Propiétaire</label>
                        <button class="contact_btn">Mettre en contact</button>
                        <div class="contact_form">
                            <form>
                                <select>
                                    <option>Je suis intéressé(e) par votre bien</option>
                                    <option>Je souhaite visiter ce bien</option>
                                    <option>Je veux me renseigner</option>
                                </select>
                                <input type="text" placeholder="Nom et Prénom">
                                <input type="email" placeholder="Email">
                                <input type="number" placeholder="Numéro de télephone">
                                <textarea cols="20" placeholder="Votre message"></textarea>
                                <button class="contact_form_btn">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile_contact_box">
                <div class="mobile_contact_info">
                    <div class="contact_id">
                        <label>User</label>
                        <p>Propiétaire</p>
                    </div>
                    <button class="contact_btn">Mettre en contact</button>
                </div>
                <div class="contact_form">
                    <form>
                        <select>
                            <option>Je suis intéressé(e) par votre bien</option>
                            <option>Je souhaite visiter ce bien</option>
                            <option>Je veux me renseigner</option>
                        </select>
                        <input type="text" placeholder="Nom et Prénom">
                        <input type="email" placeholder="Email">
                        <input type="number" placeholder="Numéro de télephone">
                        <textarea cols="20" placeholder="Votre message"></textarea>
                        <button class="contact_form_btn">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Footer start-->
    <?php include('templates/footer.php')?>
    <!--Footer end-->
    <script defer>
        //View property start
        //Image slider code code
        const buttons = document.querySelectorAll("[data-slide-btn]");
        //Image counter handler
        const currentImg = document.querySelector('#current_img');
        const totalImg = document.querySelector('#total_img');
        const images = document.querySelector("[data-slides]");
        totalImg.innerText = images.children.length;

        buttons.forEach(button =>{
        button.addEventListener("click",()=>{
            //Find which button was pressed and retrieve data from the slide container
            const offset = button.dataset.slideBtn === "next" ?1:-1
            const slides = button.closest("[data-slide-container]").querySelector("[data-slides]")
            const activeSlide = slides.querySelector("[data-active]")
            //Index
            let newIndex = [...slides.children].indexOf(activeSlide) + offset
            if(newIndex < 0) newIndex = slides.children.length -1
            if(newIndex >= slides.children.length) newIndex = 0
            //Make changes
            slides.children[newIndex].dataset.active = true
            currentImg.innerText = newIndex+1
            delete activeSlide.dataset.active
        })
        })
        //Contact form 
        const activateForms = document.querySelectorAll('.contact_btn');
        const forms = document.querySelectorAll('.contact_form');
        activateForms.forEach(activateForm=>{
                activateForm.addEventListener('click',()=>{
                forms.forEach(form=>{
                    form.classList.toggle('show');
                })
                
            })
        })
        forms.forEach(form=>{
            document.addEventListener('click',(e)=>{
            if(!e.target.closest('.contact_btn') && form.classList.contains('show')){
                if(!e.target.closest('.contact_form')){
                    form.classList.remove('show');
                }
            }
        }
        )
        })
        //Function for returning property ID
        function returnID(){
            return console.log('Yijeiei3');
        }
        //View property end
    </script>
</body>
</html>