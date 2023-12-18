<!-- Footer -->
<footer class="bg-dark text-white text-center">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4 col-12 d-flex flex-column" style="border-right:1px solid #979090;">
                <h5>Contato</h5>
                <span>Telefone: +55 (17) 99657-5631</span>
                <span>Email: olympiaworkout@gmail.com</span>
            </div>
            <div class="col-md-4 col-12 mt-md-0 mt-4">
                <h5 class="d-md-none d-block text-center">Links uteis</h5>
                <ul>
                    <li class="footer-li"><a class="footer-a" href="about.html">Sobre Nós</a></li>
                    <li class="footer-li"><a class="footer-a" href="team.html">Nossa Equipe</a></li>
                    <li class="footer-li"><a class="footer-a" href="./imc/{{ url('/') }}?return=1">Calculadora IMC</a></li>
                    <li class="footer-li">Atalho 4</li>
                </ul>
            </div>
            <div class="col-md-4 col-12">
                <h5>Nossas redes sociais</h5>
                <a class="footer-a fs-4 mx-1" href="https://instagram.com/olympia_workout?igshid=MzRIODBiNWFlZA"><i class="bi bi-instagram"></i></a>
                <a href="https://w.app/OlympiaWorkout" class="footer-a fs-4 mx-1"><i class="bi bi-whatsapp"></i></a>
                <a href="#" class="footer-a fs-4 mx-1"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <p>&copy; <span id="date">{{ date('Y') ?? '0000' }}</span> OlympiaWorkout. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</footer>
