<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=entreprise;charset=utf8','root','');

if (isset($_POST['formcompte'])) 
{
	 	$nom = htmlspecialchars($_POST['nom']);
        $siège= htmlspecialchars($_POST['siège']);
        $email = htmlspecialchars($_POST['email']);
        $email2 = htmlspecialchars($_POST['email2']);
        $password = sha1($_POST['password']);
        $password2 = sha1($_POST['password2']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $téléphone = htmlspecialchars($_POST['téléphone']);
        $nombre = htmlspecialchars($_POST['nombre']);

    	if (!empty($_POST['nom']) AND !empty($_POST['siège']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['adresse']) AND !empty($_POST['téléphone']) AND !empty($_POST['année']) AND !empty($_POST['nombre']))
    	{
       
        	$nomlength = strlen($nom);
        	$siègelength = strlen($siège);
        	$téléphonelength = strlen($téléphone);
        	$adresselength = strlen($adresse);
        	if($nomlength <= 255)
        	{
        		if($siègelength <= 255 )
        		{
        			if($adresselength <= 255 )
        			{
        				if($téléphonelength > 9 )
        				{
        					if($email == $email2)
        					{
        						if(filter_var($email, FILTER_VALIDATE_EMAIL))
        						{
        							if($password == $password2)
        							{
        								$insertentreprise = $bdd->prepare("INSERT INTO entreprises(nom, siège, email, password, adresse, téléphone, année, nombre) VALUES(?, ?, ?, ?, ?, ?, ?)");
        								$insertentreprise->execute(array($nom, $siège, $email, $password, $adresse, $téléphone, $année, $nombre));
        								$erreur = "Félicitation votre compte a bien été créé !";
        							}	
        						else
        						{
        							$erreur = "Vos mots de passe sont différent !";
        						}
        					}	
        					else
        					{
        						$erreur = "Votre adresse mail n'est pas valide !";
        					}
        				}
        				else
        				{
        					$erreur = "Vos adresses mail sont différent !";
        				}
        			}
        			else
        			{
        				$erreur = "Le numéro de votre téléphone est incorecte !";
        			}
        		}	
        		else
	    		{
	        		$erreur = "Votre adresse ne doit pas dépasser 255 caractères !";
	    		}  
        	}
        	else
        	{
        		$erreur = "Le nom de la ville du siège sociale ne doit pas dépasser 255 caractères !";
        	}
        }
        else
	    {
	        $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
	    }  
	 }  
     else
     {
     	$erreur = "Tous les champs doivent être remplis !";
     } 
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Compte Entreprise</title>
	</head>
		<header>
		<body>
			<div style="width:88%;border-bottom: 2px solid black;position: absolute;left: 5%">
				<h1 style="font-family:arial">créer un nouveau compte entreprise</h1>
			</div><br /><br /><br /><br /><br /><br />
			<form method="post" action="">
				<table>
					<tr>
						<td>
							<label for="id">Entrer le nom de votre société : </label>
						</td>
						<td>
							<input type="text" name="nom" id="id" placeholder="Nom de la société" value="<?php if(isset($nom)) { echo $nom; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="ss">Enter le siège social : </label>
						</td>
						<td>
							<input type="text" name="siège" id="ss" placeholder="Siège social" value="<?php if(isset($siège)) { echo $siège; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="em">Renseigner votre email : </label>
						</td>
						<td>
							<input type="text" name="email" id="em" placeholder="email" value="<?php if(isset($email)) { echo $email; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="em2">Confirmer votre email : </label>
						</td>
						<td>
							<input type="text" name="email2" id="em2" placeholder="email à nouveau" value="<?php if(isset($email2)) { echo $email2; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="md">Choisisser un mot de passe : </label>
						</td>
						<td>
							<input type="password" name="password" id="md" placeholder="Mot de passe">
						</td>
						<tr>
						<td>
							<label for="md">Confirmer le mot de passe : </label>
						</td>
						<td>
							<input type="password" name="password2" id="md2" placeholder="Mot de passe à nouveau">
						</td>
					</tr>
					<tr>
                        <td>
                            <label for="tel">Renseigner votre adresse: </label>
                        </td>
                        <td>
                            <textarea name="adresse" id="ad" placeholder="adresse"></textarea>
                        </td>
                    </tr>
					<tr>
						<td>
							<label for="tel">Mobile : </label>
						</td>
						<td>
							<div class="form-group">
							<label>Pays:</label>
							<select id="country" name="RegistrationModel.Country" tabindex="-1">
								<option value="">Pays</option>
								<option class="93" value="AF">Afghanistan</option>
								<option class="27" value="ZA">Afrique du Sud</option>
								<option class="355" value="AL">Albanie</option>
								<option class="213" value="DZ">Algérie</option>
								<option class="376" value="AD">Andorre</option>
								<option class="244" value="AO">Angola</option>
								<option class="1264" value="AI">Anguilla</option>
								<option class="672" value="AQ">Antarctique</option>
								<option class="1268" value="AG">Antigua-et-Barbuda</option>
								<option class="599" value="AN">Antilles néerlandaises</option>
								<option class="966" value="SA">Arabie Saoudite</option>
								<option class="54" value="AR">Argentine</option>
								<option class="374" value="AM">Arménie</option>
								<option class="297" value="AW">Aruba</option>
								<option class="994" value="AZ">Azerbaïdjan</option>
								<option class="1242" value="BS">Bahamas</option>
								<option class="973" value="BH">Bahreïn</option>
								<option class="880" value="BD">Bangladesh</option>
								<option class="1246" value="BB">Barbades</option>
								<option class="375" value="BY">Bélarus</option>
								<option class="501" value="BZ">Belize</option>
								<option class="229" value="BJ">Bénin</option>
								<option class="1441" value="BM">Bermudes</option>
								<option class="975" value="BT">Bhoutan</option>
								<option class="591" value="BO">Bolivie</option>
								<option class="387" value="BA">Bosnie-Herzégovine</option>
								<option class="267" value="BW">Botswana</option>
								<option class="55" value="BR">Brésil</option>
								<option class="673" value="BN">Brunéi Darussalam</option>
								<option class="226" value="BF">Burkina Faso</option>
								<option class="257" value="BI">Burundi</option>
								<option class="855" value="KH">Cambodge</option>
								<option class="237" value="CM" selected="selected">Cameroun</option>
								<option class="238" value="CV">Cap-Vert</option>
								<option class="56" value="CL">Chili</option>
								<option class="86" value="CN">Chine</option>
								<option class="57" value="CO">Colombie</option>
								<option class="269" value="KM">Comores</option>
								<option class="242" value="CG">Congo</option>
								<option class="243" value="CD">Congo, République démocratique</option>
								<option class="82" value="KR">Corée</option>
								<option class="506" value="CR">Costa Rica</option>
								<option class="225" value="CI">Côte d'Ivoire</option>
								<option class="53" value="CU">Cuba</option>
								<option class="253" value="DJ">Djibouti</option>
								<option class="1767" value="DM">Dominique</option>
								<option class="20" value="EG">Egypte</option>
								<option class="503" value="SV">El Salvador</option>
								<option class="971" value="AE">Emirats Arabes Unis</option>
								<option class="593" value="EC">Equateur</option>
								<option class="291" value="ER">Erythrée</option>
								<option class="251" value="ET">Ethiopie</option>
								<option class="7" value="RU">Fédération de Russie</option>
								<option class="679" value="FJ">Fidji</option>
								<option class="241" value="GA">Gabon</option>
								<option class="220" value="GM">Gambie</option>
								<option class="995" value="GE">Géorgie</option>
								<option class="233" value="GH">Ghana</option>
								<option class="350" value="GI">Gibraltar</option>
								<option class="1473" value="GD">Grenade</option>
								<option class="299" value="GL">Groenland</option>
								<option class="590" value="GP">Guadeloupe</option>
								<option class="1671" value="GU">Guam</option>
								<option class="502" value="GT">Guatemala</option>
								<option class="224" value="GN">Guinée</option>
								<option class="240" value="GQ">Guinée équatoriale</option>
								<option class="245" value="GW">Guinée-Bissau</option>
								<option class="592" value="GY">Guyane</option>
								<option class="509" value="HT">Haïti</option>
								<option class="504" value="HN">Honduras</option>
								<option class="852" value="HK">Hong Kong</option>
								<option class="61" value="CX">Ile Christmas</option>
								<option class="1345" value="KY">Iles Caïman</option>
								<option class="61" value="CC">Iles Cocos (Keeling)</option>
								<option class="682" value="CK">Iles Cook</option>
								<option class="500" value="FK">Iles Falkland (Malvinas)</option>
								<option class="298" value="FO">Iles Féroé</option>
								<option class="1670" value="MP">Iles Mariannes du Nord</option>
								<option class="692" value="MH">Iles Marshall</option>
								<option class="677" value="SB">Iles Salomon</option>
								<option class="1649" value="TC">Iles Turks et Caicos</option>
								<option class="1340" value="VI">Iles Vierges (américaines)</option>
								<option class="1284" value="VG">Iles Vierges (britanniques)</option>
								<option class="681" value="WF">Iles Wallis-et-Futuna</option>
								<option class="91" value="IN">Inde</option>
								<option class="62" value="ID">Indonésie</option>
								<option class="964" value="IQ">Irak</option>
								<option class="44" value="IM">Isle Of man</option>
								<option class="1876" value="JM">Jamaïque</option>
								<option class="81" value="JP">Japon</option>
								<option class="962" value="JO">Jordanie</option>
								<option class="7" value="KZ">Kazakhstan</option>
								<option class="254" value="KE">Kenya</option>
								<option class="996" value="KG">Kirghizistan</option>
								<option class="686" value="KI">Kiribati</option>
								<option class="965" value="KW">Koweït</option>
								<option class="856" value="LA">Laos, République démocratique populaire</option>
								<option class="266" value="LS">Lesotho</option>
								<option class="961" value="LB">Liban</option>
								<option class="231" value="LR">Liberia</option>
								<option class="218" value="LY">Libye, Jamahiriya arabe</option>
								<option class="853" value="MO">Macao</option>
								<option class="389" value="MK">Macédoine, ancienne république yougoslave</option>
								<option class="261" value="MG">Madagascar</option>
								<option class="60" value="MY">Malaisie</option>
								<option class="265" value="MW">Malawi</option>
								<option class="960" value="MV">Maldives</option>
								<option class="223" value="ML">Mali</option>
								<option class="212" value="MA">Maroc</option>
								<option class="230" value="MU">Maurice</option>
								<option class="222" value="MR">Mauritanie</option>
								<option class="262" value="YT">Mayotte</option>
								<option class="52" value="MX">Mexique</option>
								<option class="691" value="FM">Micronésie, Etats fédérés</option>
								<option class="373" value="MD">Moldavie, République</option>
								<option class="377" value="MC">Monaco</option>
								<option class="976" value="MN">Mongolie</option>
								<option class="382" value="ME">Montenegro</option>
								<option class="1664" value="MS">Montserrat</option>
								<option class="258" value="MZ">Mozambique</option>
								<option class="264" value="NA">Namibie</option>
								<option class="674" value="NR">Nauru</option>
								<option class="977" value="NP">Népal</option>
								<option class="505" value="NI">Nicaragua</option>
								<option class="227" value="NE">Niger</option>
								<option class="234" value="NG">Nigéria</option>
								<option class="683" value="NU">Nioué</option>
								<option class="687" value="NC">Nouvelle-Calédonie</option>
								<option class="64" value="NZ">Nouvelle-Zélande</option>
								<option class="968" value="OM">Oman</option>
								<option class="256" value="UG">Ouganda</option>
								<option class="92" value="PK">Pakistan</option>
								<option class="680" value="PW">Palaos</option>
								<option class="507" value="PA">Panama</option>
								<option class="675" value="PG">Papouasie Nouvelle-Guinée</option>
								<option class="595" value="PY">Paraguay</option>
								<option class="51" value="PE">Pérou</option>
								<option class="63" value="PH">Philippines</option>
								<option class="870" value="PN">Pitcairn</option>
								<option class="689" value="PF">Polynésie française</option>
								<option class="1" value="PR">Porto Rico</option>
								<option class="974" value="QA">Qatar</option>
								<option class="236" value="CF">République centrafricaine</option>
								<option class="1809" value="DO">République dominicaine</option>
								<option class="250" value="RW">Ruanda</option>
								<option class="590" value="BL">Saint Barthelemy</option>
								<option class="1599" value="MF">Saint Martin</option>
								<option class="1758" value="LC">Sainte-Lucie</option>
								<option class="1869" value="KN">Saint-Kitts-et-Nevis</option>
								<option class="39" value="VA">Saint-Siège (Etat de la Cité du Vatican)</option>
								<option class="1784" value="VC">Saint-Vincent et Grenadines</option>
								<option class="685" value="WS">Samoa</option>
								<option class="1684" value="AS">Samoa américaines</option>
								<option class="378" value="SM">San Marin</option>
								<option class="239" value="ST">Sao Tome et Principe</option>
								<option class="221" value="SN">Sénégal</option>
								<option class="381" value="RS">Serbie</option>
								<option class="248" value="SC">Seychelles</option>
								<option class="232" value="SL">Sierra Leone</option>
								<option class="252" value="SO">Somalie</option>
								<option class="249" value="SD">Soudan</option>
								<option class="94" value="LK">Sri Lanka</option>
								<option class="508" value="PM">St. Pierre et Miquelon</option>
								<option class="290" value="SH">Ste-Hélène</option>
								<option class="597" value="SR">Suriname</option>
								<option class="268" value="SZ">Swaziland</option>
								<option class="963" value="SY">Syrie, République arabe</option>
								<option class="992" value="TJ">Tadjikistan</option>
								<option class="886" value="TW">Taïwan, Province de Chine</option>
								<option class="255" value="TZ">Tanzanie, République unie</option>
								<option class="235" value="TD">Tchad</option>
								<option class="66" value="TH">Thaïlande</option>
								<option class="670" value="TL">Timor-leste</option>
								<option class="228" value="TG">Togo</option>
								<option class="690" value="TK">Tokelau</option>
								<option class="676" value="TO">Tonga</option>
								<option class="1868" value="TT">Trinidad et Tobago</option>
								<option class="216" value="TN">Tunisie</option>
								<option class="993" value="TM">Turkménistan</option>
								<option class="688" value="TV">Tuvalu</option>
								<option class="380" value="UA">Ukraine</option>
								<option class="598" value="UY">Uruguay</option>
								<option class="998" value="UZ">Uzbekistan</option>
								<option class="58" value="VE">Venezuela</option>
								<option class="84" value="VN">Viet-Nam</option>
								<option class="967" value="YE">Yémen</option>
								<option class="260" value="ZM">Zambie</option>
								<option class="263" value="ZW">Zimbabwe</option>
							</select>
							<div class="form-group">
							<label>Mobile:</label>
							<input name="RegistrationModel.MobileCountryPhone" id="mobilecountryphone" readonly="readonly" value="237" type="text">
							<input name="RegistrationModel.MobilePhone" id="mobile" tabindex="3" type="text">
						</div>
						</div>
						</td>
					</tr>
					<tr>
						<td>
							<label for="an">Donner l'année de création : </label>
							
						</td>
						<td>
							<select aria-label="Année" name="birthday_year" id="year" title="Année" class="_5dba"><option value="0">Année</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999" selected="selected">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select>
						</td>
					</tr>	
					<tr>
						<td>
							<label for="tel">Veillez mentioner le nombre de vos structures : </label>
						</td>
						<td>
							<input min="1" name="nombre" size="2" type="number" placeholder="0">
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
							<input type="submit" name="formcompte" value="Créer mon compte entreprise">
						</td>
					</tr>
				</table>
			</form>
			<?php
			if (isset($erreur)) 
			{
				echo '<font color="red">'.$erreur."</font>";
			}
			?>
		</body>	
		</header>
		<footer>
		</footer>
	</html>