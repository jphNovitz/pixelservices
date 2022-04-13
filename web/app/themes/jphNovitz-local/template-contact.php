<?php
/*
Template Name: Contact
*/

get_header();

require get_template_directory() . '/src/contact-form.php';

?>
    <section class="w-full p-12">
        <h2 class="w-full">Contact</h2>
        <div class="flex flex-col md:flex-row">
            <article class="w-full md:w-2/3 md:mr-6">
                <p class="my-6">
                    N'hésitez pas à remplir le formulaire ci-dessous ou à me raconter votre histoire et vos envies de
                    sites internet
                    à l'adresse <a href="mailto:jeanphi@liegeweb.be"
                                   class="font-bold underline text-orange-400 hover:text-orange-800 ">jeanphi@liegeweb.be</a>
                </p>
                <form action="<?php echo get_permalink();  ?>" id="contactForm" method="POST" class="w-1/2">

                    <label for="name">
                        <span class="absolute">Nom ou prénom</span>
                        <input type="text" id="name" name="_name"
                               class="custom-input ">
                    </label>

                    <label for="email">
                        <span class="absolute">Email</span>
                        <input type="text" id="email" name="_email"
                               class="custom-input">
                    </label>
                    <textarea name="_message" id="comment"   placeholder="Question ou commentaire" class="custom-textarea "></textarea>

                    <div class="my-6">
                        <input type="hidden" name="submitted" id="submitted" value="true"/>
                        <input type="submit" value="Envoi" class="bg-orange-500 text-white rounded-lg px-6 py-2">
                    </div>
                </form>
            </article>
            <article class="w-full md:w-1/3 md:ml-6 border-solid border-2 border-slate-500 rounded-lg px-4 py-12 h-max">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span>jeanphi@liegeweb.be</li>
                    <li><span class="fa-li"><i class="fab fa-facebook-messenger"></i></span>messenger moi</li>
                    <li><span class="fa-li"><i class="fab fa-whatsapp"></i></span>What's App: 0123456</li>
                    <li class="mt-6"><span class="fa-li"><i class="fab fa-instagram-square"></i></span>Instagram:
                        @liegewebe
                    </li>
                    <li><span class="fa-li"><i class="fab fa-facebook"></i></span>Facebook: @liegewebe</li>
                </ul>
            </article>
        </div>
    </section>

<?php
get_footer();
?>