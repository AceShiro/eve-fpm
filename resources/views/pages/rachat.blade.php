@extends('layouts.main')



@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Minerals Buyback</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-8">
            <form id="home">
                <table class="table table-striped">
                    <tbody><tr>
                        <th colspan="2">Minerai Raffiné</th>
                        <th>Prix Amarr</th>
                        <th>Rachat Corpo</th>
                        <th>Quantité</th>
                        <th>Total ISK</th>
                    </tr>
                    <tr>
                        <td><img src="img/trita.png"></td>
                        <td>Tritanium</td>
                        <td>4.34</td>
                        <td id="1">3.69</td>
                        <td><input id="trita" type="text" value="0"></td>
                        <td><p id="Ttrita">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/pyerite.png"></td>
                        <td>Pyerite</td>
                        <td>6.92</td>
                        <td id="2">5.88</td>
                        <td><input id="pye" type="text" value="0"></td>
                        <td><p id="Tpye">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/mexallon.png"></td>
                        <td>Mexallon</td>
                        <td>52.57</td>
                        <td id="3">44.68</td>
                        <td><input id="mex" type="text" value="0"></td>
                        <td><p id="Tmex">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/isogen.png"></td>
                        <td>Isogen</td>
                        <td>55.27</td>
                        <td id="4">46.98</td>
                        <td><input id="iso" type="text" value="0"></td>
                        <td><p id="Tiso">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/nocx.png"></td>
                        <td>Nocxium</td>
                        <td>341.67</td>
                        <td id="5">290.42</td>
                        <td><input id="nocx" type="text" value="0"></td>
                        <td><p id="Tnocx">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/zydrine.png"></td>
                        <td>Zydrine</td>
                        <td>1043,15</td>
                        <td id="6">886.55</td>
                        <td><input id="zyd" type="text" value="0"></td>
                        <td><p id="Tzyd">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/megacyte.png"></td>
                        <td>Megacyte</td>
                        <td>1311,02</td>
                        <td id="7">1114.35</td>
                        <td><input id="mega" type="text" value="0"></td>
                        <td><p id="Tmega">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td><img src="img/morphite.png"></td>
                        <td>Morphite</td>
                        <td>9925,20</td>
                        <td id="8">8436.25</td>
                        <td><input id="morp" type="text" value="0"></td>
                        <td><p id="Tmorp">0 ISK</p></td>
                    </tr>
                    <tr>
                        <td colspan="5">Total ISK</td>
                        <td><p id="total">0 ISK</p></td>
                    </tr>
                </tbody></table>
            </form>
        </div>
        
        <div class="col-lg-4">
            <form id="txt" action="http://www.clandaerie.com/eve/minerai/traitement.php" method="post">
                <p">Copier/Coller du presse papier<br> !!! ATTENTION !!!<br> Ne fonctionne qu'avec le minerai raffiné ne pas copier/coller d'autres objets<br>Ne fonctionne que si vous copiez directement depuis le jeu</p>
                <textarea name="message" rows="37" cols="57" style="height: 250px; width: 300px;"></textarea>
                <br>
                <input class="btn btn-success" type="submit" value="Calculer">
            </form>

            <br>
            <br>
            <p>Code par Alex Daerie</p>
        </div>
    </div>


        


        


    <script type="text/javascript">
        
        var nf = new Intl.NumberFormat();
        var trita = document.getElementById('trita');
        var pye = document.getElementById('pye');
        var mex = document.getElementById('mex');
        var iso = document.getElementById('iso');
        var nocx = document.getElementById('nocx');
        var zyd = document.getElementById('zyd');
        var mega = document.getElementById('mega');
        var morp = document.getElementById('morp');
        var un = document.getElementById('1').innerHTML;
        var deux = document.getElementById('2').innerHTML;
        var trois = document.getElementById('3').innerHTML;
        var quatre = document.getElementById('4').innerHTML;
        var cinq = document.getElementById('5').innerHTML;
        var six = document.getElementById('6').innerHTML;
        var sept = document.getElementById('7').innerHTML;
        var huit = document.getElementById('8').innerHTML;
        retest = 0;
        retest2 = 0;
        retest3 = 0;
        retest4 = 0;
        retest5 = 0;
        retest6 = 0;
        retest7 = 0;
        retest8 = 0;

        trita.addEventListener('change', function() {
        test = trita=$('#trita').val();
        retest =  parseFloat(test) * parseFloat(un);
        list = document.getElementById('Ttrita');
        list.innerHTML = nf.format(retest) + ' ISK';
        calcul();
        verif();
        });

        pye.addEventListener('change', function() {
        test2 = pye=$('#pye').val();
        retest2 =  parseFloat(test2) * parseFloat(deux);
        list2 = document.getElementById('Tpye');
        list2.innerHTML = nf.format(retest2) + ' ISK';
        calcul();
        verif();
        });

        mex.addEventListener('change', function() {
        test3 = mex=$('#mex').val();
        retest3 =  parseFloat(test3) * parseFloat(trois);
        list3 = document.getElementById('Tmex');
        list3.innerHTML = nf.format(retest3) + ' ISK';
        calcul();
        verif();
        });

        iso.addEventListener('change', function() {
        test4 = iso=$('#iso').val();
        retest4 =  parseFloat(test4) * parseFloat(quatre);
        list4 = document.getElementById('Tiso');
        list4.innerHTML = nf.format(retest4) + ' ISK';
        calcul();
        verif();
        });

        nocx.addEventListener('change', function() {
        test5 = nocx=$('#nocx').val();
        retest5 =  parseFloat(test5) * parseFloat(cinq);
        list5 = document.getElementById('Tnocx');
        list5.innerHTML = nf.format(retest5) + ' ISK';
        calcul();
        verif();
        });

        zyd.addEventListener('change', function() {
        test6 = zyd=$('#zyd').val();
        retest6 =  parseFloat(test6) * parseFloat(six);
        list6 = document.getElementById('Tzyd');
        list6.innerHTML = nf.format(retest6) + ' ISK';
        calcul();
        verif();
        });

        mega.addEventListener('change', function() {
        test7 = mega=$('#mega').val();
        retest7 =  parseFloat(test7) * parseFloat(sept);
        list7 = document.getElementById('Tmega');
        list7.innerHTML = nf.format(retest7) + ' ISK';
        calcul();
        verif();
        });

        morp.addEventListener('change', function() {
        test8 = morp=$('#morp').val();
        retest8 =  parseFloat(test8) * parseFloat(huit);
        list8 = document.getElementById('Tmorp');
        list8.innerHTML = nf.format(retest8) + ' ISK';
        calcul();
        verif();
        });

        function calcul() {
        res = retest + retest2 + retest3 + retest4 + retest5 + retest6 + retest7 + retest8;
        list9 = document.getElementById('total');
        list9.innerHTML = nf.format(res) + ' ISK';
        };

        function verif() {

        var trita = document.getElementById('trita');
        var pye = document.getElementById('pye');
        var mex = document.getElementById('mex');
        var iso = document.getElementById('iso');
        var nocx = document.getElementById('nocx');
        var zyd = document.getElementById('zyd');
        var mega = document.getElementById('mega');
        var morp = document.getElementById('morp');

        if (trita.value == "") {
        trita.value = 0;
        retest = 0;
        list = document.getElementById('Ttrita');
        list.innerHTML = retest + ' ISK';
        }

        if (pye.value == "") {
        pye.value = 0;
        retest2 = 0;
        list = document.getElementById('Tpye');
        list.innerHTML = retest2 + ' ISK';
        }

        if (mex.value == "") {
        mex.value = 0;
        retest3 = 0;
        list = document.getElementById('Tmex');
        list.innerHTML = retest3 + ' ISK';
        }

        if (iso.value == "") {
        iso.value = 0;
        retest4 = 0;
        list = document.getElementById('Tiso');
        list.innerHTML = retest4 + ' ISK';
        }

        if (nocx.value == "") {
        nocx.value = 0;
        retest5 = 0;
        list = document.getElementById('Tnocx');
        list.innerHTML = retest5 + ' ISK';
        }

        if (zyd.value == "") {
        zyd.value = 0;
        retest6 = 0;
        list = document.getElementById('Tzyd');
        list.innerHTML = retest6 + ' ISK';
        }

        if (mega.value == "") {
        mega.value = 0;
        retest7 = 0;
        list = document.getElementById('Tmega');
        list.innerHTML = retest7 + ' ISK';
        }
        if (morp.value == "") {
        morp.value = 0;
        retest8 = 0;
        list = document.getElementById('Tmorp');
        list.innerHTML = retest8 + ' ISK';
        }
        calcul();
        }
    </script>



@endsection