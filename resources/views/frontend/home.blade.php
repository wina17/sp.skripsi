@extends('layouts.frontend')
@section('content')
<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Sistem Pakar Diagnosa Penyakit Anjing</h1>
                
                <p class="mbr-text pb-3 mbr-fonts-style display-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis, urna sed sagittis sollicitudin, odio eros commodo tortor, non venenatis est augue at risus..&nbsp;</p>
                
            </div>
        </div>
    </div>
    
</section>

<section class="features11 cid-r80CnRiAQ6" id="features11-9">
    <div class="container">   
        <div class="col-md-12">
            <div class="media-container-row">
                <div class="mbr-figure" style="width: 50%;">
                    <img src="{{ asset ('frontend/assets/images/vetheader-615x290.jpg') }}" alt="SP Pakar" title="">
                </div>
                <div class=" align-left aside-content">
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-2">
                        Kata Pengantar</h2>
                    <div class="mbr-section-text">
                        <p class="mbr-text mb-5 pt-3 mbr-light mbr-fonts-style display-7">
                        Perkembangan ilmu kecerdasan buatan (artifical intelligence) telah berbaur baik dengan perubahan yang dinamis dalam kehidupan manusia. &nbsp;Kemudahan melakukan pekerjaan dalam perkembangan AI telah dirasakan pada diberbagai bidang kehidupan manusia, salah satunya bidang kesehatan. <br><br>Bagian dari cabang ilmu AI, Sistem Pakar (expert system) juga memberikan kontribusi yang luar biasa dalam perkembangan dunia kesehatan, baik dengan membantu pakar menyediakan informasi diagnosis atau melakukan diagnosis berdasarkan ilmu pengetahuan dari pakar.<br></p>
                    </div>

                    <div class="block-content">
                        <div class="card p-3 pr-3">
                            <div class="media">
                                     
                                <div class="media-body">
                                    <h4 class="card-title mbr-fonts-style display-7">&nbsp;</h4>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>          
</section>

<section class="accordion2 cid-r80U6Vxy3b" id="accordion2-b">
    <div class="container">
        <div class="media-container-row pt-5">
            <div class="accordion-content">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Tentang Sistem Pakar</h2>
                <h3 class="mbr-section-subtitle pt-2 align-center mbr-light mbr-fonts-style display-5">
                    Sistem ini dapat digunakan untuk diagnosis penyakit anjing yang dialami secara umum, bukan penjelasan secara spesifikasi hanya pada jenis ras anjing tertentu.<br></h3>
                <div id="bootstrap-accordion_6" class="panel-group accordionStyles accordion pt-5 mt-3" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse1_6" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Tujuan</h4>
                                </a>
                            </div>
                            <div id="collapse1_6" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_6">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                        1.   Melakukan analisa tentang ilmu pakar yang digunakan pada saat mendiagnosis suatu penyakit dan penggunaan metode Certainty Factor yang membantu sistem melakukan diagnosis.
                                        2.  Merancang sistem pakar yang dapat membantu mendiagnosis penyakit yang dialami oleh anjing tanpa perlu kehadiran seorang pakar.
                                        3.  Melakukan evaluasi dari hasil perancangan sistem dengan membandingkan dengan hasil analisa dari pakar.</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse2_6" aria-expanded="false" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Manfaat</h4>
                                </a>
                                
                            </div>
                            <div id="collapse2_6" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#bootstrap-accordion_6">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       Sedangkan manfaat yang akan didapat dari hasil penelitian ini, yaitu:
                                        1.  Mendapatkan informasi tentang penyakit dan perawatan anjing lebih praktis dengan memanfaatkan website yang mudah diakses oleh pengguna.
                                        2.  Membantu pengguna untuk mendiagnosis penyakit yang dialami oleh anjing dengan menjawab pertanyaan pada sesi konsultasi dengan sistem.</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse3_6" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Jenis Penyakit</h4>
                                </a>
                            </div>
                            <div id="collapse3_6" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#bootstrap-accordion_6">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       Sistem ini mampu melakukan diagnosa terkomputerisasi untuk 10 jenis penyakit, diantaranya: Rabies, Canine Cough, Canine Distemper, Canine Parvovirus, Heartworm, Roundworm, Earmites dan Lyme Brucellosis</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header" role="tab" id="headingFour">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-core="" href="#collapse4_6" aria-expanded="false" aria-controls="collapse4">
                                    <h4 class="mbr-fonts-style display-5">
                                        <span class="sign mbr-iconfont mbri-arrow-down inactive"></span>Cara Konsultasi</h4>
                                </a>
                            </div>
                            <div id="collapse4_6" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#bootstrap-accordion_6">
                                <div class="panel-body p-4">
                                    <p class="mbr-fonts-style panel-text display-7">
                                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in nulla ut magna vehicula libero luctus in ipsum consequat faucibus. Ut porta nulla ac dapibus convallis. Curabitur sit amet massa quam. In ut ex auctor, porta neque quis, sagittis purus. Nunc auctor gravida magna, sed efficitur tortor tristique quis.</p>
                                </div>
                            </div>
                        </div>
            </div><br>
            <div class="mbr-figure" style="width: 96%;">
                    <img src="{{ asset ('frontend/assets/images/mbr-992x558.jpg') }}" alt="SP Pakar" title="">
            </div>
        </div>
    </div>
</section>

<section class="mbr-instagram-feed" data-rows="" data-per-row-slider="4" data-spacing="11" data-full-width="true" data-token="6287694087.727bfe1.f177f1b98f1840dba493501b4903596d" data-per-row-grid="" id="instagram-feed-block-e" data-rv-view="11" style="background-image: url({{ asset ('frontend/assets/images/mbr-1-1920x1280.jpg') }}); padding-top: 40px; padding-bottom: 40px;">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(239, 239, 239);">
    </div>
    <div class="container container_toggle">
        <div class="row">
            <div class="col">
                <div class="inst">
                    <h1 class="inst__title align-center mbr-fonts-style display-2">Instagram Feed</h1>
                    <div class="inst__content"></div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection