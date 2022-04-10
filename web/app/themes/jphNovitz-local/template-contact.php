<?php
/*
Template Name: Contact
*/

get_header();

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
                <form action="" class="w-1/2">
                    <div class="my-6 pb-2 flex flex-col relative h-8 ">
                        <label for="name" class="absolute focus:text-transparent">Nom ou prénom</label>
                        <input type="text" id="name" class="absolute w-full border-none bg-transparent focus:outline-none border-b-2 border-b-slate-200 focus:border-b-slate-600">
                    </div>
                    <div class="my-6 pb-2 flex flex-col relative border-b-slate-300 active:border-b-slate-900">
                        <label for="email" class="absolute">Email</label>
                        <input type="text" id="email" class="absolute bg-transparent">
                    </div>
                    <div class="my-6">
                        <textarea name="" id="" cols="50" rows="20" class="bg-transparent border border-b-slate-400 active:border-b-slate-900"></textarea>
                    </div>
                    <div class="my-6">
                        <input type="submit" value="Envoi" class="bg-orange-500 text-white rounded-lg px-6 py-2">
                    </div>
                </form>
            </article>
            <article class="w-full md:w-1/3 md:ml-6 border-solid border-2 border-slate-500 rounded-lg p-4 max-h-fit">
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