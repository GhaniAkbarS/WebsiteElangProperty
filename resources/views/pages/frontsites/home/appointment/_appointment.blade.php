<!--Appointment One Start-->
<section class="appointment-one">
    <div class="appointment-one__inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="appointment-one__left">
                        <h3 class="appointment-one__title">Hitung Simulasi Online Rumah</h3>
                        <p class="appointment-one__text">Hasil Simulasi Hanyalah Estimasi.
                            Untuk Lebih Lanjut Silakan Hubungi Admin.</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="appointment-one__right">
                        <div class="appointment-one__form-box">
                            <form action="assets/inc/sendemail.php"
                                class="appointment-one__form contact-form-validated" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="appointment-one__input-box">
                                            <h3 class="appointment-one__input-title">Harga Property *</h3>
                                            <input type="text" placeholder="" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="appointment-one__input-box">
                                            <h3 class="appointment-one__input-title">Pilih Tenor</h3>
                                            <div class="appointment-one__showing-sort">
                                                <select class="selectpicker"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Tenor ...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="appointment-one__input-box">
                                                <h3 class="appointment-one__input-title">Uang Muka *</h3>
                                                <input type="email" placeholder="Kosong untuk DP minimal" name="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="appointment-one__input-box">
                                                <h3 class="appointment-one__input-title">Luas Bangunan</h3>
                                                <div class="appointment-one__showing-sort">
                                                    <select class="selectpicker" aria-label="Default select example">
                                                        <option selected>Pilih Bangunan ...</option>
                                                        <option value="1">Luas Bangunan &le; 21 m&sup2;</option>
                                                        <option value="2">Luas Bangunan 22 m&sup2; - 70 m&sup2;</option>
                                                        <option value="3">Luas Bangunan &gt; 70 m&sup2;</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="appointment-one__input-box">
                                                <h3 class="appointment-one__input-title">Aset Ke</h3>
                                                <div class="appointment-one__showing-sort">
                                                    <select class="selectpicker" aria-label="Default select example">
                                                        <option selected>Pilih Aset ...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="appointment-one__input-box">
                                                <h3 class="appointment-one__input-title">Pekerjaan</h3>
                                                <div class="appointment-one__showing-sort">
                                                    <select class="selectpicker" aria-label="Default select example">
                                                        <option selected>Pilih Pekrjaan ...</option>
                                                        <option value="1">karyawan Tetap</option>
                                                        <option value="2">Profesi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="appointment-one__btn-box">
                                            <button type="submit"
                                                class="thm-btn appointment-one__btn">Hitung Simulasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Appointment One End-->
