<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/**
*
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2008 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'ISO-8859-1',
	'PHPSHOP_USER_LIST_LBL' => 'Nutzerliste',
	'PHPSHOP_USER_LIST_USERNAME' => 'Nutzername',
	'PHPSHOP_USER_LIST_FULL_NAME' => 'Voller Name',
	'PHPSHOP_USER_LIST_GROUP' => 'Gruppe',
	'PHPSHOP_USER_FORM_LBL' => 'Hinzuf�gen/Aktualisieren von Nutzern',
	'PHPSHOP_USER_FORM_PERMS' => 'Nutzertyp',
	'PHPSHOP_USER_FORM_CUSTOMER_NUMBER' => 'Kundennummer',
	'PHPSHOP_MODULE_LIST_LBL' => 'Modulliste',
	'PHPSHOP_MODULE_LIST_NAME' => 'Modulname',
	'PHPSHOP_MODULE_LIST_PERMS' => 'Modulbeschr�nkung',
	'PHPSHOP_MODULE_LIST_FUNCTIONS' => 'Funktionen',
	'PHPSHOP_MODULE_FORM_LBL' => 'Modul Information',
	'PHPSHOP_MODULE_FORM_MODULE_LABEL' => 'Modulbezeichnung (f�r Top-Men�)',
	'PHPSHOP_MODULE_FORM_NAME' => 'Modulname',
	'PHPSHOP_MODULE_FORM_PERMS' => 'Modulbeschr�nkungen',
	'PHPSHOP_MODULE_FORM_HEADER' => 'Modulkopf',
	'PHPSHOP_MODULE_FORM_FOOTER' => 'Modulfu�',
	'PHPSHOP_MODULE_FORM_MENU' => 'Modul sichtbar im Top-Men�?',
	'PHPSHOP_MODULE_FORM_ORDER' => 'Reihenfolge',
	'PHPSHOP_MODULE_FORM_DESCRIPTION' => 'Modulbeschreibung',
	'PHPSHOP_MODULE_FORM_LANGUAGE_CODE' => 'Sprache',
	'PHPSHOP_MODULE_FORM_LANGUAGE_FILE' => 'Language File',
	'PHPSHOP_FUNCTION_LIST_LBL' => 'Funktionsliste',
	'PHPSHOP_FUNCTION_LIST_NAME' => 'Funktionsname',
	'PHPSHOP_FUNCTION_LIST_CLASS' => 'Klassenname',
	'PHPSHOP_FUNCTION_LIST_METHOD' => 'Klassenmethode',
	'PHPSHOP_FUNCTION_LIST_PERMS' => 'Beschr�nkungen',
	'PHPSHOP_FUNCTION_FORM_LBL' => 'Funktionsinformation',
	'PHPSHOP_FUNCTION_FORM_NAME' => 'Funktionsname',
	'PHPSHOP_FUNCTION_FORM_CLASS' => 'Klassenname',
	'PHPSHOP_FUNCTION_FORM_METHOD' => 'Klassenmethode',
	'PHPSHOP_FUNCTION_FORM_PERMS' => 'Funktionsbeschr�nkungen',
	'PHPSHOP_FUNCTION_FORM_DESCRIPTION' => 'Funktionsbeschreibung',
	'PHPSHOP_CURRENCY_LIST_LBL' => 'W�hrungsliste',
	'PHPSHOP_CURRENCY_LIST_NAME' => 'W�hrungsname',
	'PHPSHOP_CURRENCY_LIST_CODE' => 'W�hrungssymbol/-k�rzel',
	'PHPSHOP_COUNTRY_LIST_LBL' => 'L�nderliste',
	'PHPSHOP_COUNTRY_LIST_NAME' => 'L�ndername',
	'PHPSHOP_COUNTRY_LIST_3_CODE' => 'L�nderk�rzel (3 Zeichen)',
	'PHPSHOP_COUNTRY_LIST_2_CODE' => 'L�nderk�rzel (2 Zeichen)',
	'PHPSHOP_STATE_LIST_MNU' => 'Bundesl�nder auflisten',
	'PHPSHOP_STATE_LIST_LBL' => 'Bundesl�nderliste f�r: ',
	'PHPSHOP_STATE_LIST_ADD' => 'Hinzufg�en/Aktualisieren eines Bundeslandes',
	'PHPSHOP_STATE_LIST_NAME' => 'Name des Bundeslandes',
	'PHPSHOP_STATE_LIST_3_CODE' => 'Abk�rzung (3 Zeichen)',
	'PHPSHOP_STATE_LIST_2_CODE' => 'Abk�rzung (2 Zeichen)',
	'PHPSHOP_ADMIN_CFG_GLOBAL' => 'Global',
	'PHPSHOP_ADMIN_CFG_SITE' => 'Seite',
	'PHPSHOP_ADMIN_CFG_SHIPPING' => 'Lieferung',
	'PHPSHOP_ADMIN_CFG_CHECKOUT' => 'Bestellung',
	'PHPSHOP_ADMIN_CFG_DOWNLOADABLEGOODS' => 'Downloads',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE' => 'Ausschlie�lich als Katalog benutzen',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE_EXPLAIN' => 'Falls aktiviert, sind alle Warenkorb- und Bestellfunktionen deaktiviert.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES' => 'Preise zeigen',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES_EXPLAIN' => 'Wenn aktiviert, werden Preise angezeigt. Im Katalog-Modus ist es manchmal sinnvoll, die Preise von Produkten nicht zu zeigen.',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX' => 'Virtuelle Steuern?',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX_EXPLAIN' => 'Wenn aktiviert, werden auf Produkte mit einem Gewicht von 0 besteuert (Standard). Die Datei ps_checkout.php->calc_order_taxable() kann hierbei angepasst werden.',
	'PHPSHOP_ADMIN_CFG_TAX_MODE' => 'Steuer-Modus:',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_SHIP' => 'Basierend auf der Lieferadresse',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_VENDOR' => 'Basierend auf der Betreiberadresse',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EXPLAIN' => 'Hiermit wird bestimmt, welche Steuerrate zur Anwendung kommt:<br />
                                                                                    <ul><li>die, die dem Herkunftsland des Kunden entspricht</li>
                                                                                    <li>die, die dem Herkunftsland des Shop-Betreibers entspricht</li>
																					<li>oder "EU Modus", bei dem ein pro-Produkt-Steuersatz verwendet wird wenn der Kunde aus der Europ�ischen Union stammt, ansonsten aber - falls vorhanden! - der Steuersatz des Landes verwendet wird, aus dem der Kunde kommt.</li>
																					</ul>',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE' => 'Mehrere Steuerraten benutzen?',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE_EXPLAIN' => 'Wenn aktiviert, k�nnen verschiedene Produkte jeweils eigene Steuerraten erhalten (z.B. 7% f�r B�cher, 16% f�r andere Waren)',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE' => 'Rabatt f�r Zahlungarten vor Steuern und Lieferkosten abziehen?',
	'PHPSHOP_ADMIN_CFG_REVIEW' => 'Kunden-Rezensionen und Produktbewertungen nutzen/erlauben?',
	'PHPSHOP_ADMIN_CFG_REVIEW_EXPLAIN' => 'Wenn aktiviert, k�nnen registrierte Nutzer <strong>Produkte bewerten</strong> und <strong>Rezensionen schreiben</strong>.<br />
                                                                                Kunden wird es so erm�glicht, die eigenen Erfahrungen mit Produkten mit anderen Kunden zu teilen.<br />',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE_EXPLAIN' => 'Wenn aktiviert, werden Rabatte auf bestimmte Zahlungsarten vor Steuern und Lieferkosten abgezogen.',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS' => 'Zustimmung zu Gesch�ftsbedingungen erforderlich?',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_EXPLAIN' => 'Falls aktiviert, k�nnen sich Kunden nur im Shop registrieren, wenn Sie vorher den Gesch�ftsbedingungen zustimmen.',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK' => 'Inventarverwaltung nutzen?',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK_EXPLAIN' => 'Falls aktiviert, wird stets �berpr�ft, ob das Produkt, welches ein Kunde in den Warenkorb legen m�chte,
                                                                                        noch im Bestand ist. Zudem wird bei jedem Produkt die noch vorhandene St�ckzahl angezeigt.
                                                                                          Falls nicht aktiviert, kann der Kunde mehr Produkte in den Warenkorb legen, als angegeben (Standard).',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE' => 'Affiliate-Programm aktivieren?',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE_EXPLAIN' => 'Dies aktiviert die Nutzung des Shops durch sog. \'affiliates\'. Sollte nur aktiviert werden, falls man bestimmt Shopper zur \'Affiliate\'-Liste hinzugef�gt hat.',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT' => 'Bestell-Email Format:',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_TEXT' => 'Text email',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_HTML' => 'HTML email',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_EXPLAIN' => 'Dies bestimmt, wie die Best�tigungs-emails aufgemacht sind:<br />
                                                                                        <ul><li>als a einfache Text-email</li>
                                                                                        <li>oder als eine formatierte HTML-email mit Bildern.</li></ul>',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN' => 'Frontend-Administration f�r nicht-Backend Nutzer erlauben?',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN_EXPLAIN' => 'Mit dieser Einstellung kann es nicht-Backend-Nutzern (mit storeadmin oder admin Rechten) erm�glicht werden,
                                                                                              die Frontend Administration zu nutzen (z.B. f�r registrierte Nutzer / Autoren).',
	'PHPSHOP_ADMIN_CFG_URLSECURE' => 'Sichere URL',
	'PHPSHOP_ADMIN_CFG_URLSECURE_EXPLAIN' => 'The sichere Web-Adresse zur Seite. (Beginnt mit https - mit einem Schr�gstrich am Ende!)',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE' => 'HOMEPAGE',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE_EXPLAIN' => 'Dies ist die Seite, die geladen wird, falls kein page= Parameter angegeben ist.',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE' => 'ERRORPAGE',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE_EXPLAIN' => 'Dies ist die Standard-Detail-Seite f�r Fehlermeldungen (veraltet).',
	'PHPSHOP_ADMIN_CFG_DEBUG' => 'DEBUG ?',
	'PHPSHOP_ADMIN_CFG_DEBUG_EXPLAIN' => 'Schaltet den Debugging-Modus zur Fehlersuche an.',
	'PHPSHOP_ADMIN_CFG_FLYPAGE' => 'FLYPAGE',
	'PHPSHOP_ADMIN_CFG_FLYPAGE_EXPLAIN' => 'Dies ist die Standardseite, um Produktdetails anzuzeigen.',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE' => 'Standard - Kategorie-Vorlage',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE_EXPLAIN' => 'Hiermit wird die standardm��ig zu ladende Vorlagendatei (template) angegeben,
                                                                                                      die Produkte in einer �bersicht anzeigt.<br />
                                                                                                      Es k�nnen durch Anpassung der vorhandenen neue Vorlagen erstellt werden.<br />
                                                                                                      Diese Vorlagen befinden sich im Verzeichnis <strong>COMPONENTPATH/html/templates/</strong>
                                                                                                      und fangen mit \'browse_\' an',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW' => 'Produkte pro Zeile',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW_EXPLAIN' => 'Die legt die Standardm��ige Anzahl von Produkte in einer Tabellenzeile fest. <br />
                                                                                                      Beispiel: Ist 4 eingetragen, werden standardm��ig (falls keine spezielle Kategorie angegeben ist,
                                                                                                      4 Produkte pro Zeile angezeigt.',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE' => '"kein Bild vorhanden" - Bild',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE_EXPLAIN' => 'Dies Bild wird gezeigt, falls kein eigenes Produktbild vorhanden ist.',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION' => 'Fu�zeile ',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION_EXPLAIN' => 'Zeigt ein Bild \'powered-by-mambo-phpShop\' in der Fu�zeile.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_STANDARD' => 'Standard Liefermodul mit individuell konfigurierbaren Transportunternehmen und Lieferarten. <strong>Empfohlen!</strong>',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_ZONE' => 'Zonen-Liefermodul, Country Version 1.0<br />
                                                                                                          F�r weitere Informationen zu diesem Modul steht <a href="http://ZephWare.com">http://ZephWare.com</a><br />
                                                                                                          zur Verf�gung oder kontaktieren Sie <a href="mailto:zephware@devcompany.com">ZephWare.com</a>.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_DISABLE' => 'Liefermodule NICHT nutzen. Z.B. wenn Sie Downloadbare G�ter verkaufen, die nicht ausgeliefert werden m�ssen.',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR' => 'Bestellbegleitende �bersicht aktivieren?',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR_EXPLAIN' => 'Falls aktiviert, wird dem Kunden w�hrend der verschiedenen Schritte der Bestellung jederzeit visuell signalisiert,
                                                                                                        an welcher Stelle er/sie sich gerade befindet ( 1 - 2 - 3 - 4 mit Graphiken).',
	'PHPSHOP_ADMIN_CFG_CHECKOUT_PROCESS' => 'Bestellprozess ausw�hlen',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS' => 'Download-Feature aktivieren',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS_EXPLAIN' => 'Dies muss aktiviert werden, falls downloadbare G�ter verkauft werden sollen.',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS' => 'Bestellstatus, mit dem der Download erm�glicht wird.',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS_EXPLAIN' => 'W�hlen Sie den Bestellstatus aus, bei dem der Kunde �ber den Download per e-mail benachrichtigt wird.',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS' => 'Bestellstatus mit dem der Download deaktiviert wird.',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS_EXPLAIN' => 'Bestellstatus, mit dem der Download f�r den Kunden deaktiviert wird.',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT' => 'DOWNLOAD-Pfad',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT_EXPLAIN' => 'Das physikalische Verzeichnis (keine URL!) zu den Dateien, die Kunden per ID herunterladen k�nnen (Schr�gstrich am Ende!)<br>
        <span class="message">Aus Sicherheitsgr�nden sollte dieses Verzeichnis in jedem Fall au�erhalb des Web-Wurzelverzeichnisses liegen.</span>',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX' => 'Download-Maximum',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX_EXPLAIN' => 'Gibt die Anzahl von Dowloads an, die mit einer Download-ID durchgef�hrt werden k�nnen.',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE' => 'Download-Zeitspanne',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE_EXPLAIN' => 'Gibt die Zeitspanne <strong>in Sekunden</strong> an, in der der Kunde den Download durchf�hren kann.
  Die Zeitspanne l�uft ab dem ersten Download. Ist diese abgelaufen, wird die Download-ID deaktiviert.<br />Hinweis : 86400s=24h, 43%s=5d.',
	'PHPSHOP_COUPONS' => 'Gutscheine',
	'PHPSHOP_COUPONS_ENABLE' => 'Gutschein-Benutzung aktivieren',
	'PHPSHOP_COUPONS_ENABLE_EXPLAIN' => 'Wird die Gutschein-Benutzung aktiviert, wird es dem Kunden erlaubt, w�hrend des Bestellvorgangs einen Gutschein-Code einzugeben.',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON' => 'PDF - Button',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON_EXPLAIN' => 'Den PDF - Button im Shop anzeigen / nicht anzeigen',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER' => 'Zu JEDER Bestellung Zustimmung zu AGB verlangen?',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER_EXPLAIN' => 'Aktivieren, falls vom Kunden zu JEDER Bestellung eine Zustimmung zu den AGB verlangt werden soll.',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS' => 'Produkte zeigen, die nicht verf�gbar sind?',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS_EXPLAIN' => 'Falls angehakt,  werden auch solche Produkte gezeigt, deren Inventarmenge 0 betr�gt. Ansonsten werden die Produkte nicht angezeigt.',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE' => 'Shop OFFLINE schalten?',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_TIP' => 'Solange aktiviert, ist der Shop durch Kunden nicht nutzbar. Es wird die Offline-Nachricht angezeigt',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_MSG' => 'Offline-Nachricht',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX' => 'Tabellenpr�fix f�r Shop-Tabellen',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX_TIP' => 'Standard ist: <strong>vm</strong>.',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP' => 'Seitennavigation �ber der Produktliste?',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP_TIP' => 'Soll �ber der Auflistung von Produkten im Frontend eine Seitennavigation auch �BER der Liste angezeigt werden?',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT' => 'Anzahl der Produkte zeigen?',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT_TIP' => 'Soll die Anzahl von Produkte innerhalb einer Kategorie angezeigt werden? Beispiel: Gartenger�te (4)',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING' => 'Dynamisches Verkleinern von Produktbildern aktivieren?',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING_TIP' => 'Falls aktiviert, werden Produktbilder automatisch auf die unten angebenen Ma�e verkleinert.
Hierzu wird zwingend die GD1 / GD2 Bibliothek ben�tigt. Das Vorhandensein der GD2 Unterst�tzung kann unter "System" -> "System Info" -> "PHP Info" -> gd angezeigt werden.
Die Qualit�t der erzeugten Bilder ist viel besser, als wenn die Bilder vom Browser des Kunden verkleinert dargestellt w�rden. Die verkleinerten Bilder sind im Verzeichnis /shop_image/prduct/resized/ zu finden. Falls das Bild bereits verkleinert wurde, wird immer wieder die vorhandene Kopie genutzt.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH' => 'Breite des verkleinerten Bildes',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH_TIP' => 'Die Ziel<strong>breite</strong> des verkleinerten Bildes.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT' => 'H�he des verkleinerten Bildes',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT_TIP' => 'Die Ziel<strong>h�he</strong> des verkleinerten Bildes.',
	'PHPSHOP_ADMIN_CFG_SHIPPING_NO_SELECTION' => 'Bitte mindestens EINE Versandart ausw�hlen!',
	'PHPSHOP_ADMIN_CFG_PRICE_CONFIGURATION' => 'Preiskonfiguration',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL' => 'Nutzergruppe, die Preise sehen darf.',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL_TIP' => 'Die ausgew�hlte Nutzergruppe und alle Nutzergruppen mit h�heren Nutzerrechten k�nnen die Produktpreise sehen.',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX' => 'Anzeigen von "(inkl. XX% MwSt.)"? (falls anwendbar)',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX_TIP' => 'Falls aktiviert, wird hinter Preisen "(inkl. xx% MwSt.)" angezeigt (falls Preise denn auch inkl. Steuern angezeigt werden).',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL' => 'Preis-Label f�r Verpackungseinheiten verwenden?',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL_TIP' => 'Falls aktiviert, wird das Preis-Label durch die Verpackungseinheit vorgegeben:
<strong>Preis pro Paket (10 St�ck)<strong><br/>
<br/>
Falls nicht aktiviert, sehen Preis-Labels wie immer aus:<br/>
<strong>Preis: $xx.xx</strong>',
	'PHPSHOP_ADMIN_CFG_MORE_CORE_SETTINGS' => 'mehr Haupteinstellungen',
	'PHPSHOP_ADMIN_CFG_CORE_SETTINGS' => 'Haupteinstellungen',
	'PHPSHOP_ADMIN_CFG_FRONTEND_FEATURES' => '(De-)Aktivieren von Features',
	'PHPSHOP_ADMIN_CFG_TAX_CONFIGURATION' => 'Steuerkonfiguration',
	'PHPSHOP_ADMIN_CFG_USER_REGISTRATION_SETTINGS' => 'Einstellungen zur Nutzerregistrierung',
	'PHPSHOP_ADMIN_CFG_ALLOW_REGISTRATION' => 'Nutzerregistrierung erlaubt?',
	'PHPSHOP_ADMIN_CFG_ACCOUNT_ACTIVATION' => 'Aktivierung von neuen Kundenaccounts notwendig?',
	'VM_FIELDMANAGER_NAME' => 'Feldname',
	'VM_FIELDMANAGER_TITLE' => 'Feldtitel',
	'VM_FIELDMANAGER_TYPE' => 'Feldtyp',
	'VM_FIELDMANAGER_REQUIRED' => 'Pflichtfeld',
	'VM_FIELDMANAGER_PUBLISHED' => 'Ver�ffentlicht',
	'VM_FIELDMANAGER_SHOW_ON_REGISTRATION' => 'Im Registrierungsformular anzeigen',
	'VM_FIELDMANAGER_SHOW_ON_ACCOUNT' => 'In der Accountverwaltung anzeigen',
	'VM_USERFIELD_FORM_LBL' => 'Hinzuf�gen / �ndern von Nutzerfeldern',
	'VM_BROWSE_ORDERBY_DEFAULT_FIELD_LBL' => 'standardm��ige Produktsortierung',
	'VM_BROWSE_ORDERBY_DEFAULT_FIELD_LBL_TIP' => 'Legt fest, welches Kriterium f�r die Sortierung von Produkten auf der �bersichtsseite verwendet wird.',
	'VM_BROWSE_ORDERBY_FIELDS_LBL' => 'Verf�gbare "Sortiere-nach" Felder',
	'VM_BROWSE_ORDERBY_FIELDS_LBL_TIP' => 'W�hlen Sie die "Sortiere-nach" Felder aus, die angezeigt werden sollen. Jedes Feld definiert ein Sortierkriterium.',
	'VM_GENERALLY_PREVENT_HTTPS' => 'Sichere https Verbindungen vermeiden?',
	'VM_GENERALLY_PREVENT_HTTPS_TIP' => 'Falls diese Option aktiviert ist, werden https Verbindungen vermieden, falls sie nicht notwendig sind (Geschwindigkeitssteigerung). So wird ein Kunde zur <strong>http</strong> URL weitergeleitet, falls er nicht in Bereichen des Shops surft, die https erfordern.',
	'VM_ALLOW_EXTENDED_CLASSES' => 'Klassenerweiterungen in Themes erlauben?',
	'VM_ALLOW_EXTENDED_CLASSES_TIP' => 'Falls diese Option aktiviert ist, k�nnen die Standardklassen von Virtuemart durch eigene Programmierung im Themes-Verzeichnis-> /user_classes/ erweitert oder �berschrieben werden. Wenn Sie diese Funktionalit�t nicht ben�tigen, sollten Sie diese Option aus Sicherheitsgr�nden deaktivieren.',
	'VM_MODULES_FORCE_HTTPS' => 'Shop-Bereiche, in denen https Verbindungen erforderlich sind.',
	'VM_MODULES_FORCE_HTTPS_TIP' => 'Tragen Sie hier die Shopmodule ein, die https Verbindungen erzwingen (Siehe "Administrator" => "Module auflisten", Standard: "account,checkout").',
	'VM_SHOW_REMEMBER_ME_BOX' => 'Anzeigen der "Angemeldet bleiben" Box bei der Anmeldung?',
	'VM_SHOW_REMEMBER_ME_BOX_TIP' => 'Falls ausgew�hlt, kann der Kunde sich entscheiden, ob seine Anmeldung in einem Cookie gespeichert wird. Das Aktivieren dieser Option ist nicht empfohlen, falls die SSL-Verbindung �ber einen zentralen, auch von anderen genutzten Server l�uft. Grund: der evtl. fehlende Cookie f�hrt dazu, dass sich der Kunden zweimal anmelden muss.',
	'VM_ADMIN_CFG_REVIEW_MINIMUM_COMMENT_LENGTH' => 'Mindestl�nge f�r die Rezension',
	'VM_ADMIN_CFG_REVIEW_MINIMUM_COMMENT_LENGTH_TIP' => 'Die ist die Menge von Zeichen, die mindestens vom Kunden eingegeben werden muss, bevor die Rezension abgesendet werden kann.',
	'VM_ADMIN_CFG_REVIEW_MAXIMUM_COMMENT_LENGTH' => 'Maximall�nge f�r die Rezension',
	'VM_ADMIN_CFG_REVIEW_MAXIMUM_COMMENT_LENGTH_TIP' => 'Die ist die Menge von Zeichen, die maximal vom Kunden eingegeben werden kann.',
	'VM_ADMIN_SHOW_EMAILFRIEND' => 'Anzeigen der Verkn�pfung "Einem Freund empfehlen"?',
	'VM_ADMIN_SHOW_EMAILFRIEND_TIP' => 'Falls aktiviert, wird eine kleine Verkn�pfung angezeigt, die es Kunden erm�glicht, Produkte an Bekannte per E-Mail zu empfehlen.',
	'VM_ADMIN_SHOW_PRINTICON' => 'Anzeigen der Verkn�pfung "Ausdrucken"?',
	'VM_ADMIN_SHOW_PRINTICON_TIP' => 'Falls aktiviert, wird eine kleine Verkn�pfung angezeigt, die es Kunden erm�glicht, die aktuelle Seite auszudrucken.',
	'VM_REVIEWS_AUTOPUBLISH' => 'Rezensionen automatisch ver�ffentlichen?',
	'VM_REVIEWS_AUTOPUBLISH_TIP' => 'Falls aktiviert, werden Kundenrezensionen automatisch ver�ffentlicht, sobald sie eingesendet wurden. Ansonsten m�ssen Rezensionen manuell freigegeben werden.',
	'VM_ADMIN_CFG_PROXY_SETTINGS' => 'Globale Proxy Einstellungen',
	'VM_ADMIN_CFG_PROXY_URL' => 'URL des Proxy-Servers',
	'VM_ADMIN_CFG_PROXY_URL_TIP' => 'Beispiel: <strong>http://10.42.21.1</strong>.<br />
Im Zweifelsfall leerlassen.</strong> Dieser Wert wird verwendet, um von dem Shopserver ins Internet kommunizieren zu k�nnen (z.B. um Versandkosten live abzufragen).',
	'VM_ADMIN_CFG_PROXY_PORT' => 'Proxy Port',
	'VM_ADMIN_CFG_PROXY_PORT_TIP' => 'Der Port, der f�r die Kommunikation mit dem Proxy Server genutzt werden soll (meistens <b>80</b> oder <b>8080</b>).',
	'VM_ADMIN_CFG_PROXY_USER' => 'Proxy Nutzername',
	'VM_ADMIN_CFG_PROXY_USER_TIP' => 'Sollte der Proxy eine Authentifizierung erfordern, bitte hier den Nutzernamen eintragen.',
	'VM_ADMIN_CFG_PROXY_PASS' => 'Proxy Passwort',
	'VM_ADMIN_CFG_PROXY_PASS_TIP' => 'Sollte der Proxy eine Authentifizierung erfordern, bitte hier das Passwort eintragen.',
	'VM_ADMIN_ONCHECKOUT_SHOW_LEGALINFO' => 'Verbraucherhinweis zum Widerrufs- oder R�ckgaberecht anzeigen?',
	'VM_ADMIN_ONCHECKOUT_SHOW_LEGALINFO_TIP' => 'In Deutschland besteht die Verpflichtung, den Verbraucher bereits vor Abschluss eines unter ausschlie�licher Verwendung von Fernkommunikationsmitteln geschlossenen Vertrages auf sein unabdingbares R�ckgabe- bzw Widerrufsrecht hinzuweisen. Daher sollte dieser Konfigurationspunkt unbedingt aktiviert werden.',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_SHORTTEXT' => 'Widerrufs- und R�ckgabebelehrung (Kurzversion).',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_SHORTTEXT_TIP' => 'Dieser Text informiert den Kunden �ber dessen Widerrufs- und R�ckgaberecht (wird �ber der Schaltfl�che "Bestellung absenden" auf der letzten Seite des Bestellvorgangs angezeigt).',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_LINK' => 'Ausf�hrliche Version der Widerrufs- und R�ckgabebelehrung (Link zu einem Artikel).',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_LINK_TIP' => 'Hier kann ein Artikel ausgew�hlt werden, der den Kunden ausf�hrlich �ber dessen Widerrufs- und R�ckgaberecht informiert.
Bitte hier einen Artikel ausw�hlen!',
	'VM_SELECT_THEME' => 'W�hlen Sie das Thema/Stil f�r den Shop',
	'VM_SELECT_THEME_TIP' => 'Themen erlauben das Anpassen und Ver�ndern des Seitenlayouts f�r den Shop.',
	'VM_CFG_CONTENT_PLUGINS_ENABLE' => 'Mambots/Plugins in Beschreibungen aktivieren?',
	'VM_CFG_CONTENT_PLUGINS_ENABLE_TIP' => 'If enabled, product and category descriptions are parsed by all published content mambots/plugins.',
	'VM_CFG_CURRENCY_MODULE' => 'W�hlen Sie ein W�hrungsumrechungsmodul aus',
	'VM_CFG_CURRENCY_MODULE_TIP' => 'This allows you to select a certain currency converter module. Such modules fetch exchange rates from a server and convert one currency into another.',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EU' => 'EU-Modus',
	'VM_ADMIN_CFG_DOWNLOAD_KEEP_STOCKLEVEL' => 'Keep Product Stock Level on Purchase?',
	'VM_ADMIN_CFG_DOWNLOAD_KEEP_STOCKLEVEL_TIP' => 'When enabled, the stock level for a downloadable product is not lowered although it was purchased by customers.',
	'VM_USERGROUP_FORM_LBL' => 'Hinzuf�gen/�ndern einer Nutzergruppe',
	'VM_USERGROUP_NAME' => 'Name der Nutzergruppe',
	'VM_USERGROUP_LEVEL' => 'Berechtigungsebene der Nutzergruppe',
	'VM_USERGROUP_LEVEL_TIP' => 'Wichtig! Ein gr��erer Wert bedeutet <b>weniger</b> Berechtigungen als Gruppen mit niedrigerem Wert. Die <b>admin</b> Gruppe ist <em>level 0</em>, storeadmin ist level 250, users ist level 500.',
	'VM_USERGROUP_LIST_LBL' => 'Nutzergruppenliste',
	'VM_ADMIN_CFG_COOKIE_CHECK' => 'Enable the Cookie Check?',
	'VM_ADMIN_CFG_COOKIE_CHECK_EXPLAIN' => 'If enabled, VirtueMart checks wether the browser of the customer accepts cookies or not. This is user-friendly, but it can have negative consequences on the Search-Engine-Friendlyness of your shop.',
	'VM_CFG_REGISTRATION_TYPE' => 'User Registration Type',
	'VM_CFG_REGISTRATION_TYPE_TIP' => 'Choose the type of User Registration for your store!<br />
<strong>Normal Registration</strong><br />
This is the standard registration type where the customer must register and choose an username and password<br /><br />
<strong>Silent Registration</strong><br />
Silent Registration means the customer doesn\'t need to choose username and password, but those are created automatically during registration and sent to the provided email address.
<br /><br />
<strong>Optional Registration</strong><br />
Opotional Registration let\'s the customer choose wether he/she wants to create an account or not. If the customer wants to create an account, a username and password must be chosen.
<br /><br />
<strong>No Registration</strong><br />
Customers don\'t need to and are not able to register in this type of registration.',
	'VM_CFG_REGISTRATION_TYPE_NORMAL_REGISTRATION' => 'Normal Account Creation',
	'VM_CFG_REGISTRATION_TYPE_SILENT_REGISTRATION' => 'Silent Account Creation',
	'VM_CFG_REGISTRATION_TYPE_OPTIONAL_REGISTRATION' => 'Optional Account Creation',
	'VM_CFG_REGISTRATION_TYPE_NO_REGISTRATION' => 'No Account Creation',
	'VM_ADMIN_CFG_FEED_CONFIGURATION' => 'Feed Configuration',
	'VM_ADMIN_CFG_FEED_ENABLE' => 'Enable Product Feeds',
	'VM_ADMIN_CFG_FEED_ENABLE_TIP' => 'If enabled, customers can subscribe to a feed that provides the latest products (of all or of a certain category) in your store.',
	'VM_ADMIN_CFG_FEED_CACHE' => 'Feed Cache Settings',
	'VM_ADMIN_CFG_FEED_CACHE_ENABLE' => 'Enable Cache?',
	'VM_ADMIN_CFG_FEED_CACHETIME' => 'Cache Time (seconds)',
	'VM_ADMIN_CFG_FEED_CACHE_TIP' => 'Caching speeds up the feed delivery and reduces the server load, because the feed is only created once and saved to a file.',
	'VM_ADMIN_CFG_FEED_SHOWPRICES' => 'Include the Product Price into the description?',
	'VM_ADMIN_CFG_FEED_SHOWPRICES_TIP' => 'If enabled, the standard Product Price will be added to the Product Description',
	'VM_ADMIN_CFG_FEED_SHOWDESC' => 'Include the Product Description?',
	'VM_ADMIN_CFG_FEED_SHOWDESC_TIP' => 'If enabled, the Product Description will be added to the feed item',
	'VM_ADMIN_CFG_FEED_SHOWIMAGES' => 'Include Images into the feed?',
	'VM_ADMIN_CFG_FEED_SHOWIMAGES_TIP' => 'If enabled, the thumb images will be included with the feed item.',
	'VM_ADMIN_CFG_FEED_DESCRIPTION_TYPE' => 'Type of Product Description',
	'VM_ADMIN_CFG_FEED_DESCRIPTION_TYPE_TIP' => 'Choose the type of product description that will be included with the feed.',
	'VM_ADMIN_CFG_FEED_LIMITTEXT' => 'Limit the Description?',
	'VM_ADMIN_CFG_FEED_MAX_TEXT_LENGTH' => 'Maximum Description Length',
	'VM_ADMIN_CFG_MAX_TEXT_LENGTH_TIP' => 'This is the maximum length of the product description for each feed item.',
	'VM_ADMIN_CFG_FEED_TITLE_TIP' => 'Title of the Feed (the placeholder {storename} holds the name of your store)',
	'VM_ADMIN_CFG_FEED_TITLE_CATEGORIES_TIP' => 'Title of a Category Feed (\'{catname}\' is the placeholder for the category name, {storename} holds the name of your store)',
	'VM_ADMIN_CFG_FEED_TITLE' => 'Feed Title',
	'VM_ADMIN_CFG_FEED_TITLE_CATEGORIES' => 'Feed Title for Categories',
	'VM_ADMIN_SECURITY' => 'Security',
	'VM_ADMIN_SECURITY_SETTINGS' => 'Security Settings',
	'VM_CFG_ENABLE_FEATURE' => 'Enable this Feature',
	'VM_CFG_CHECKOUT_SHOWSTEP_TIP' => 'Here you can enable, disable and reorder certain Checkout Steps. You can show multiple Steps on one Page by giving them the same Step Number.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_FLEX' => 'Flex Shipping. Fixed shipping cost to set base value of order with percentage of total sale above base value',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_SHIPVALUE' => 'Shipping based on order totals. Fixed shipping costs based on values entered in configuration.',
	'VM_CFG_CHECKOUT_SHOWSTEPINCHECKOUT' => 'Show on Step: %s of the Checkout Process.',
	'VM_ADMIN_ENCRYPTION_KEY' => 'Encryption Key',
	'VM_ADMIN_ENCRYPTION_KEY_TIP' => 'Used to safely store and retrieve sensible data (like credit card information) encrypted in the database.',
	'VM_ADMIN_STORE_CREDITCARD_DATA' => 'Store Credit Card Information?',
	'VM_ADMIN_STORE_CREDITCARD_DATA_TIP' => 'VirtueMart stores the Credit Card Information of Customers encrypted in the database. This is done even if the Credit Card Information is processed by an external  server. <strong>If you don\'t need to process Credit Card Information manually after the order has been placed, you should turn this option off.</strong>',
	'VM_USERFIELDS_URL_ONLY' => 'URL only',
	'VM_USERFIELDS_HYPERTEXT_URL' => 'Hypertext and URL',
	'VM_FIELDS_TEXTFIELD' => 'Text Field',
	'VM_FIELDS_CHECKBOX_SINGLE' => 'Check Box (Single)',
	'VM_FIELDS_CHECKBOX_MULTIPLE' => 'Check Box (Muliple)',
	'VM_FIELDS_DATE' => 'Date',
	'VM_FIELDS_DROPDOWN_SINGLE' => 'Drop Down (Single Select)',
	'VM_FIELDS_DROPDOWN_MULTIPLE' => 'Drop Down (Multi-Select)',
	'VM_FIELDS_EMAIL' => 'Email Address',
	'VM_FIELDS_EUVATID' => 'EU VAT ID',
	'VM_FIELDS_EDITORAREA' => 'Editor Text Area',
	'VM_FIELDS_TEXTAREA' => 'Text Area',
	'VM_FIELDS_RADIOBUTTON' => 'Radio Button',
	'VM_FIELDS_WEBADDRESS' => 'Web Address',
	'VM_FIELDS_DELIMITER' => '=== Fieldset delimiter ===',
	'VM_FIELDS_NEWSLETTER' => 'Newsletter Subscription',
	'VM_USERFIELDS_READONLY' => 'Read-Only',
	'VM_USERFIELDS_SIZE' => 'Field Size',
	'VM_USERFIELDS_MAXLENGTH' => 'Max Length',
	'VM_USERFIELDS_DESCRIPTION' => 'Description, field-tip: text or HTML',
	'VM_USERFIELDS_COLUMNS' => 'Columns',
	'VM_USERFIELDS_ROWS' => 'Rows',
	'VM_USERFIELDS_EUVATID_MOVESHOPPER' => 'Move the customer into the following shopper group upon successful validation of the EU VAT ID',
	'VM_USERFIELDS_ADDVALUES_TIP' => 'Use the table below to add new values.',
	'VM_ADMIN_CFG_DISPLAY' => 'Display',
	'VM_ADMIN_CFG_LAYOUT' => 'Layout',
	'VM_ADMIN_CFG_THEME_SETTINGS' => 'Theme Settings',
	'VM_ADMIN_CFG_THEME_PARAMETERS' => 'Parameters',
	'VM_ADMIN_ENCRYPTION_FUNCTION' => 'Encryption Function',
	'VM_ADMIN_ENCRYPTION_FUNCTION_TIP' => 'Here you can select the encryption function used to encrypt sensible information before being stored in the database. AES_ENCRYPT is recommended, because it is very secure. ENCODE doesn\'t provide real encryption.',
	'SAVE_PERMISSIONS' => 'Save Permissions',
	'VM_ADMIN_THEME_CFG_NOT_EXISTS' => 'The configuration file for this template does not exist and can\'t be created. Configuration is not possible',
	'VM_ADMIN_THEME_NOT_EXISTS' => 'The theme "{theme}" does not exist.',
	'VM_USERFIELDS_ADDVALUE' => 'Add a Value',
	'VM_USERFIELDS_TITLE' => 'Title',
	'VM_USERFIELDS_VALUE' => 'Value',
	'VM_USER_FORM_LASTVISIT_NEVER' => 'Never',
	'VM_USER_FORM_TAB_GENERALINFO' => 'General User Information',
	'VM_USER_FORM_LEGEND_USERDETAILS' => 'User Details',
	'VM_USER_FORM_LEGEND_PARAMETERS' => 'Parameters',
	'VM_USER_FORM_LEGEND_CONTACTINFO' => 'Contact Information',
	'VM_USER_FORM_NAME' => 'Name',
	'VM_USER_FORM_USERNAME' => 'Username',
	'VM_USER_FORM_EMAIL' => 'Email',
	'VM_USER_FORM_NEWPASSWORD' => 'New Password',
	'VM_USER_FORM_VERIFYPASSWORD' => 'Verify Password',
	'VM_USER_FORM_GROUP' => 'Group',
	'VM_USER_FORM_BLOCKUSER' => 'Block User',
	'VM_USER_FORM_RECEIVESYSTEMEMAILS' => 'Receive System Emails',
	'VM_USER_FORM_REGISTERDATE' => 'Register Date',
	'VM_USER_FORM_LASTVISITDATE' => 'Last Visit Date',
	'VM_USER_FORM_NOCONTACTDETAILS_1' => 'No Contact details linked to this User:',
	'VM_USER_FORM_NOCONTACTDETAILS_2' => 'See \'Components -> Contact -> Manage Contacts\' for details.',
	'VM_USER_FORM_CONTACTDETAILS_NAME' => 'Name',
	'VM_USER_FORM_CONTACTDETAILS_POSITION' => 'Position',
	'VM_USER_FORM_CONTACTDETAILS_TELEPHONE' => 'Telephone',
	'VM_USER_FORM_CONTACTDETAILS_FAX' => 'Fax',
	'VM_USER_FORM_CONTACTDETAILS_CHANGEBUTTON' => 'Change Contact Details',
	'VM_ADMIN_CFG_LOGFILE_HEADER' => 'Logfile Configuration',
	'VM_ADMIN_CFG_LOGFILE_ENABLED' => 'Enable logging?',
	'VM_ADMIN_CFG_LOGFILE_ENABLED_EXPLAIN' => 'If disabled, a "null" logger will be instantiated instead, so that the vmFileLogger can still be invoked without error.',
	'VM_ADMIN_CFG_LOGFILE_NAME' => 'Logfile Name',
	'VM_ADMIN_CFG_LOGFILE_NAME_EXPLAIN' => 'Path to logfile. Must be reachable and writeable.',
	'VM_ADMIN_CFG_LOGFILE_LEVEL' => 'Logging level',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_EXPLAIN' => 'Log messages above this priority threshold will be ignored.',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_TIP' => 'TIP - 8',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_DEBUG' => 'DEBUG - 7',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_INFO' => 'INFO - 6',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_NOTICE' => 'NOTICE - 5',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_WARNING' => 'WARNING - 4',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_ERR' => 'ERROR - 3',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_CRIT' => 'CRITICAL - 2',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_ALERT' => 'ALERT - 1',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_EMERG' => 'EMERGENCY - 0',
	'VM_ADMIN_CFG_LOGFILE_FORMAT' => 'Logfile format',
	'VM_ADMIN_CFG_LOGFILE_FORMAT_EXPLAIN' => 'Format for individual logfile line entries.',
	'VM_ADMIN_CFG_LOGFILE_FORMAT_EXPLAIN_EXTRA' => 'Logfile format fields can include any of the following: %{timestamp} %{ident} [%{priority}] [%{remoteip}] [%{username}] %{message} %{vmsessionid}.',
	'VM_ADMIN_CFG_LOGFILE_ERROR' => 'Cannot create or access log file.  Please contact the system or website administrator.',
	'VM_ADMIN_CFG_DEBUG_MODE_ENABLED' => 'Enable DEBUG mode?',
	'VM_ADMIN_CFG_DEBUG_IP_ENABLED' => 'Limit by IP address?',
	'VM_ADMIN_CFG_DEBUG_IP_ENABLED_EXPLAIN' => 'Limit debugging output to a specific client IP address?',
	'VM_ADMIN_CFG_DEBUG_IP_ADDRESS' => 'Client IP address',
	'VM_ADMIN_CFG_DEBUG_IP_ADDRESS_EXPLAIN' => 'If you enable this option and enter an IP address here, then debug output will be enabled ONLY for this client IP address.  Other clients will not see the debugging output.',
	'VM_FIELDMANAGER_SHOW_ON_SHIPPING' => 'Show in shipping form',
	'VM_USER_NOSHIPPINGADDR' => 'No shipping addresses.',
	'VM_UPDATE_CHECK_LBL' => 'VirtueMart Update Check',
	'VM_UPDATE_CHECK_VERSION_INSTALLED' => 'VirtueMart Version installed here',
	'VM_UPDATE_CHECK_LATEST_VERSION' => 'Latest VirtueMart Version',
	'VM_UPDATE_CHECK_CHECKNOW' => 'Check now!',
	'VM_UPDATE_CHECK_DLUPDATE' => 'Download Update',
	'VM_UPDATE_CHECK_CHECKING' => 'Checking...',
	'VM_UPDATE_CHECK_CHECK' => 'Check',
	'VM_UPDATE_NOTDOWNLOADED' => 'The Update Package could not be downloaded.',
	'VM_UPDATE_PREVIEW_LBL' => 'VirtueMart Update Preview',
	'VM_UPDATE_WARNING_TITLE' => 'General Warning',
	'VM_UPDATE_WARNING_TEXT' => 'Installing an Update for VirtueMart using a Patch Package can cause damage on your site
if you have already modified some files of the VirtueMart component. The Patching Process will overwrite all the files listed below - it won\'t just apply smaller changes (diff), but replace the existing file with the new one. If you have modified VirtueMart files on your own, this can lead to inconsistent files and missing class/function dependencies.',
	'VM_UPDATE_PATCH_DETAILS' => 'Patch Details',
	'VM_UPDATE_PATCH_DESCRIPTION' => 'Description',
	'VM_UPDATE_PATCH_DATE' => 'Release Date',
	'VM_UPDATE_PATCH_FILESTOUPDATE' => 'Files to be updated',
	'VM_UPDATE_PATCH_STATUS' => 'Status',
	'VM_UPDATE_PATCH_WRITABLE' => 'Writable',
	'VM_UPDATE_PATCH_UNWRITABLE' => 'File/Directory not writable',
	'VM_UPDATE_PATCH_QUERYTOEXEC' => 'Queries to be executed on the Database',
	'VM_UPDATE_PATCH_CONFIRM_TEXT' => 'I have read the <a href="#warning">Warning</a> and I\'m sure to apply the Patch Package to my VirtueMart Installation now.',
	'VM_UPDATE_PATCH_APPLY' => 'Apply Patch now',
	'VM_UPDATE_PATCH_ERR_UNWRITABLE' => 'Not all files/directories which need to be updated are writable. Please correct the permissions first.',
	'VM_UPDATE_PATCH_PLEASEMARK' => 'Please mark the checkbox before you apply the Patch.',
	'VM_UPDATE_RESULT_TITLE' => 'Currently Installed Version',
	'VM_FIELDS_CAPTCHA' => 'Captcha Field (using com_securityimages)',
	'VM_FIELDS_AGEVERIFICATION' => 'Age Verification (Date Select Fields)',
	'VM_FIELDS_AGEVERIFICATION_MINIMUM' => 'Specify the minimum Age'
); $VM_LANG->initModule( 'admin', $langvars );
?>