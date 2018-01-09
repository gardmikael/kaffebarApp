# kaffebarApp for Digi Publishing


<h3>Database/SQL: Tabeller</h3>

<b>items</b>
<ul>
<li>id* - Auto inkrementell primærnøkkel</li>
<li>name – Påkrevd tekst</li>
<li>img_path – Valgfri path til bilde for varen, med default value til eksisterende bilde. </li>
<li>item_group – Påkrevd varegruppe. (Det finnes ingen tabell for varegrupper, så denne er hardkodet for å kunne skille på ulike type varer)</li>
<li>timestamps() – feltene created_at og updated_at oppdateres automatisk. </li>
</ul>

<p>Items-tabellen inneholder alle (rå)varer. Alle varer som registreres i systemet ligger her.</p>

<b>sales_items</b>
<ul>
<li>item_id* - Primærnøkkel og fremmednøkkel</li>
<li>price – Påkrevd tall med to desimaler</li>
</ul>

<p>Dersom en vare også skal selges, vil den ligge i sales_item-tabellen.</p>

<b>orders</b>
<ul>
<li>id* - Auto inkrementell primærnøkkel</li>
<li>total – Påkreved tall med to desimaler</li>
<li>timestamps() - Feltene created_at og updated_at oppdateres automatisk. </li>
</ul>

<p>Orders holder orden på når en ordre ble opprettet og den totale sluttsummen.</p>

<b>order_items</b>
<ul>
<li>order_id* - Primærnøkkel som peker på id i orders-tabellen</li>
<li>item_id* - Primærnøkkel som peker på id i items-tabellen</li>
<li>quantity - Positiv heltallsverdi som holder antallet av hver vare</li>
</ul>

<p>I order_items ligger alle varene som er knyttet til en ordre. Primærnøkkelen er sammensatt av order_id og item_id.

<h2>Kommentarer</h2>
Denne oppgaven er utført på omlag 2 dager, noe som også setter føringer på hvordan man velger å implementere databasestrukturen.
Men det er forsøkt å overholde de kravene som oppgaven stiller. Jeg diskuterer gjerne alternative strukturer for et mer skalerbart system.
Jeg vil også utdype nærmere angående følgende punkter:
<br/>
<br/>

<i>Slette varer</i><br/>
Det å slette tupler fra databasen kan være problematisk. Dette gjelder også i dette eksemplet.  Ettersom en ordre inneholder fremmednøkler til varer, vil man potensielt få ordrer som peker til en ikke-eksisterende vare. 
Det står det skal være mulig å slette, men jeg har valgt å holde integriteten ved like. Alternativt kunne man hatt et felt (feks. <i>active</i>) i items-tabellen.
Dette kunne vært en boolean. Man kunne så bare vist aktive varer i POS. Dette er <i>ikke</i> implementert.
<br/>
<br/>
<i>Validering</i><br/>
En ordre som sendes blir på serversiden validert på følgende måte: 
-	Man sjekker om item_id fins i items-tabellen.
-	Man sjekker om quantity er et heltall over 0.
<br/>
<br/>
Dette er fordi tabellen som inneholder varene i hver ordre (order_items) kun inneholder item_id, quantity og en fremmednøkkel, order_id, som peker på ordrenummeret. 
Et av problemene med dette er at man i teorien kan endre f. eks pris på klient-siden (endre Vue.js-modellen) ettersom valideringen kun sjekker om items-id'en er gyldig. 
Jeg har derfor valgt å returnere en ny liste hvor prisene er hentet fra varetabellen.

