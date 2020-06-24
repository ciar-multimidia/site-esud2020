<?php 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title>'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
echo '<meta name="theme-color" content="#00568B" />';	
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'; echo join(' ',get_body_class()); if (get_field('pgespecial')) { echo ' '.get_field('pgespecial'); }
echo '">';

echo '<main>';


	echo '<header id="cabecalho" class="'.(is_front_page() ? 'home' : '').'">';
		get_template_part('img/grafismo1');

		if ( has_nav_menu( 'primary' ) ) {
			echo '<nav class="container" id="menu" role="navigation">'; 
				echo '<h1 id="nome-evento"><a href="'.get_bloginfo('url').'">ESUD 2020</a></h1>';
				echo '<button id="botao-menu" aria-expanded="false">&#9776; Navegação</button>';
				ciar_menu('primary'); 
			echo '</nav>';
		}


		echo '<div class="area-cabecalho">';
		if (is_front_page()) {

			echo '<div class="imagem-fundo" style="background-image:url(';
				$fundo = get_field('fundo_cabecalho');

				if( !empty($fundo) ) {
									
					$getRandom = $fundo[ array_rand( $fundo ) ];
					$imgAleatoria = $getRandom['imagem' ];

					echo $imgAleatoria['sizes']['large'];

				} else {
					echo get_template_directory_uri().'/img/fundo-001.png';
				}
			echo ');"></div>';




			echo '<div class="container">';
				echo '<div class="marca">';
					// echo '<img src="'.get_template_directory_uri().'/img/marca.svg" alt="Marca do ESUD 2020">';
					echo '<svg fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 268 160" version="1.1" xmlns="http://www.w3.org/2000/svg">
  <path fill="#fff" fill-rule="nonzero" d="M153.68 151.3c.7 0 1.33.17 1.9.5.55.32 1 .78 1.32 1.36.33.59.49 1.25.49 2 0 .73-.16 1.4-.49 1.98a3.54 3.54 0 01-3.22 1.87 3.57 3.57 0 01-3.24-1.87 4 4 0 01-.49-1.99 4 4 0 01.5-1.99c.32-.58.76-1.04 1.33-1.36.56-.33 1.2-.5 1.9-.5zm-58.9 0c.7 0 1.33.17 1.9.5.56.32 1 .78 1.33 1.36.32.59.48 1.25.48 2 0 .73-.16 1.4-.48 1.98a3.54 3.54 0 01-3.22 1.87 3.57 3.57 0 01-3.24-1.87 4 4 0 01-.49-1.99 4 4 0 01.49-1.99c.33-.58.77-1.04 1.34-1.36.56-.33 1.2-.5 1.9-.5zm-9.01.04c.9 0 1.64.22 2.23.66.6.44 1 1.04 1.19 1.8H87.9c-.17-.4-.43-.73-.8-.97a2.39 2.39 0 00-1.33-.36c-.47 0-.9.1-1.27.33-.37.22-.66.53-.87.93-.2.4-.31.89-.31 1.43 0 .58.1 1.07.32 1.48.21.41.51.73.9.95.38.21.83.32 1.35.32.62 0 1.16-.2 1.6-.58.45-.39.72-.92.81-1.6h-2.76v-.89h3.79V156a3.6 3.6 0 01-.6 1.51c-.3.45-.71.81-1.22 1.08-.5.27-1.09.4-1.74.4-.73 0-1.38-.16-1.94-.48-.56-.33-1-.78-1.3-1.36a4.19 4.19 0 01-.46-1.99c0-.74.15-1.4.46-1.98.3-.58.74-1.03 1.3-1.36.55-.32 1.2-.48 1.93-.48zm89.97 5.58c0 .37-.1.71-.27 1.03-.18.31-.45.57-.8.76-.37.19-.81.29-1.34.29-.51 0-.97-.1-1.37-.28a2.4 2.4 0 01-.97-.76c-.24-.32-.38-.7-.42-1.13h1.3c.04.33.18.61.42.84.25.24.58.36.99.36.37 0 .65-.1.85-.3.2-.2.3-.46.3-.77 0-.27-.07-.49-.22-.66a1.57 1.57 0 00-.55-.41c-.22-.1-.52-.22-.9-.34-.47-.15-.86-.3-1.15-.45a1.86 1.86 0 01-1.06-1.77c0-.4.1-.76.3-1.06.2-.31.48-.55.85-.71.37-.17.8-.25 1.28-.25.77 0 1.38.18 1.83.55.45.37.7.85.77 1.45h-1.31a1.27 1.27 0 00-.4-.73c-.22-.2-.51-.3-.9-.3-.33 0-.6.08-.81.26-.2.17-.31.42-.31.75 0 .25.07.46.21.63.14.17.32.3.54.4.22.1.51.2.89.33.48.15.87.3 1.17.45a1.92 1.92 0 011.08 1.82zm-31.08-5.58c.9 0 1.64.22 2.24.66.6.44.99 1.04 1.18 1.8h-1.28c-.16-.4-.43-.73-.8-.97a2.39 2.39 0 00-1.33-.36c-.47 0-.89.1-1.26.33-.38.22-.67.53-.88.93-.2.4-.31.89-.31 1.43 0 .58.1 1.07.32 1.48.21.41.51.73.9.95.39.21.84.32 1.35.32a2.37 2.37 0 002.42-2.17h-2.76v-.9h3.78V156a3.6 3.6 0 01-.6 1.51c-.3.45-.71.81-1.22 1.08-.5.27-1.09.4-1.74.4-.73 0-1.38-.16-1.94-.48-.56-.33-1-.78-1.3-1.36a4.2 4.2 0 01-.46-1.99c0-.74.16-1.4.46-1.98.3-.58.74-1.03 1.3-1.36.55-.32 1.2-.48 1.93-.48zm-16.55 5.95h-3.17l-.58 1.63h-1.3l2.77-7.4h1.4l2.76 7.4h-1.3l-.58-1.63zm39.16 0h-3.17l-.58 1.63h-1.3l2.77-7.4h1.4l2.75 7.4h-1.3l-.57-1.63zm-65.6-5.89v7.52h-1.2v-7.52h1.2zm19.74 0v7.52h-1.21v-7.52h1.21zm39.16 0v7.52h-1.21v-7.52h1.21zm-52.2 5.9h-3.17l-.57 1.62h-1.3l2.77-7.4h1.4l2.75 7.4h-1.3l-.57-1.63zm9.62 1.62h-1.22l-3.65-5.55v5.55h-1.22v-7.5h1.22l3.65 5.56v-5.57h1.22v7.51zm-23.2-6.48c-.48 0-.92.1-1.3.32-.37.23-.66.54-.87.95-.2.41-.31.9-.31 1.44 0 .55.1 1.03.31 1.44.21.41.5.73.88.95.38.22.8.33 1.29.33.47 0 .9-.11 1.27-.33.37-.22.66-.54.87-.95.21-.41.32-.9.32-1.44 0-.55-.1-1.03-.32-1.44-.2-.4-.5-.72-.87-.95-.37-.22-.8-.32-1.27-.32zm58.89 0c-.48 0-.91.1-1.29.32-.38.23-.67.54-.88.95-.2.41-.31.9-.31 1.44 0 .55.1 1.03.31 1.44.21.41.5.73.88.95.38.22.8.33 1.29.33.48 0 .9-.11 1.27-.33.38-.22.67-.54.88-.95.2-.41.31-.9.31-1.44 0-.55-.1-1.03-.31-1.44-.21-.4-.5-.72-.88-.95-.37-.22-.8-.32-1.27-.32zm-18.94 3.02c0-.31.1-.57.31-.78.21-.22.47-.32.78-.32a1.06 1.06 0 011.09 1.1c0 .3-.1.56-.32.77-.21.2-.47.3-.77.3-.3 0-.57-.1-.78-.3-.2-.21-.31-.47-.31-.77zm-6.97.9l-1.24-3.52-1.25 3.51h2.5zm39.16 0l-1.25-3.52-1.24 3.51h2.49zm-58.9 0l-1.24-3.52-1.25 3.51h2.5zm158.66-4.18h-9.94a.95.95 0 000 1.91h9.94a.95.95 0 100-1.9zm-254.93 0H1.82a.95.95 0 100 1.91h9.94a.95.95 0 100-1.9zm155.6-2.44l-2.35 1.2v-.85l2.36-1.3v.95zm-60.56.17l-1.53.9v-.84l1.53-.88 1.51.88v.84l-1.5-.9zm150.18-1.8l9.7-.02a.95.95 0 000-1.9h-8.79a10.35 10.35 0 00-10.3-9.38l-79.76.02H20.91c-5.38 0-9.82 4.13-10.3 9.39h-8.8a.96.96 0 000 1.9h9.71c.53 0 .96-.42.96-.95a8.44 8.44 0 018.43-8.43h12.25l.15.03 134.26-.03h67.62l.08-.02h12.33a8.44 8.44 0 018.43 8.43c0 .52.43.95.95.95zm-136.12-47.63h-.07c-.5 0-.86.4-.86.9v12.45c0 2.18-.54 3.83-1.63 4.94-1.1 1.1-2.69 1.66-4.79 1.66-2.14 0-3.75-.55-4.84-1.65-1.1-1.1-1.64-2.75-1.64-4.95v-12.45a.88.88 0 00-.88-.87h-.08c-.48 0-.83.39-.84.87v12.24c0 2.78.7 4.89 2.1 6.32 1.4 1.43 3.46 2.14 6.18 2.14 2.7 0 4.75-.72 6.15-2.16 1.4-1.44 2.1-3.54 2.1-6.3v-12.24c0-.5-.4-.9-.9-.9zm-71.09 18.26a.8.8 0 00-.79-.79h-.06a.72.72 0 00-.46.17h-.01c-.93.76-1.85 1.33-2.76 1.68-1.03.4-2.16.6-3.4.6-2.47 0-4.38-.8-5.74-2.41-1.36-1.61-2.04-3.9-2.04-6.86 0-2.94.68-5.21 2.04-6.81 1.36-1.6 3.27-2.4 5.73-2.4 1.25 0 2.38.2 3.41.6.9.34 1.78.89 2.68 1.62l.03.02h.01a.8.8 0 001.35-.6.8.8 0 00-.22-.53l-.03-.04a8.47 8.47 0 00-3.16-2.06 11.5 11.5 0 00-4.07-.7c-2 0-3.72.44-5.16 1.31a8.69 8.69 0 00-3.34 3.74 13.23 13.23 0 00-1.19 5.85c0 2.28.4 4.24 1.19 5.88a8.66 8.66 0 003.34 3.77 9.8 9.8 0 005.16 1.3c1.48 0 2.84-.23 4.07-.69a8.45 8.45 0 003.17-2.08.79.79 0 00.25-.57zm48.6-5.1a5.03 5.03 0 00-1.88-1.57 13.9 13.9 0 00-2.61-.96c-.95-.24-1.91-.48-2.87-.7-.94-.24-1.8-.51-2.6-.81a4.57 4.57 0 01-1.87-1.25 3.06 3.06 0 01-.7-2.08c0-1.38.51-2.46 1.51-3.23s2.4-1.15 4.2-1.15a9.06 9.06 0 016 2.19c.15.15.36.25.6.25a.82.82 0 00.58-1.38l-.03-.02a9.08 9.08 0 00-4.39-2.38 11.87 11.87 0 00-6.8.44 5.55 5.55 0 00-3.53 5.28c0 1.06.22 1.93.65 2.61a5 5 0 001.76 1.66c.74.43 1.56.78 2.46 1.05.9.28 1.82.51 2.76.71 1 .24 1.92.5 2.76.78.84.28 1.52.66 2.04 1.14.52.48.78 1.14.78 1.98 0 1.34-.5 2.38-1.5 3.12-1 .74-2.4 1.11-4.2 1.11-1.5 0-2.8-.2-3.89-.6a9.92 9.92 0 01-2.92-1.76l-.1-.08a.8.8 0 00-.5-.18h-.06c-.45 0-.78.37-.78.82 0 .27.15.5.37.65l-.01.01a9.8 9.8 0 004.8 2.5c.94.2 1.96.3 3.06.3 1.56 0 2.91-.25 4.05-.74a6.06 6.06 0 002.64-2.06c.62-.88.93-1.9.93-3.09 0-1.06-.23-1.92-.7-2.57zm90.02 8.44c-2.4 0-4.22-.92-5.46-2.77-1.25-1.85-1.86-4.57-1.86-8.15 0-3.6.61-6.32 1.84-8.16 1.23-1.84 3.05-2.76 5.48-2.76 2.42 0 4.24.92 5.47 2.76 1.23 1.84 1.85 4.55 1.85 8.13 0 3.58-.62 6.3-1.86 8.16a6.14 6.14 0 01-5.46 2.8zm40.2 0c-2.4 0-4.22-.92-5.46-2.77-1.24-1.85-1.86-4.57-1.86-8.15 0-3.6.61-6.32 1.84-8.16 1.24-1.84 3.06-2.76 5.48-2.76 2.42 0 4.25.92 5.48 2.76 1.23 1.84 1.84 4.55 1.84 8.13 0 3.58-.62 6.3-1.86 8.16a6.14 6.14 0 01-5.46 2.8zm-150.7-1.83h-.08-10.44v-8.43h10.57v-.01a.81.81 0 00-.04-1.63h-.07l-.09.02H67.37v-8.13h10.51a.8.8 0 000-1.6H65.54v21.37h12.34a.8.8 0 000-1.6zm-20-18.88a.9.9 0 00-.9-.87h-.08c-.48 0-.84.39-.85.87v19.57c0 .5.44.9.93.9.5 0 .9-.4.9-.9v-19.57zM129.25 121v-19.66c0-.47.38-.85.85-.85h6c2.25 0 4.17.4 5.75 1.23a8.32 8.32 0 013.62 3.61c.83 1.6 1.25 3.53 1.25 5.81 0 2.3-.42 4.25-1.26 5.84a8.49 8.49 0 01-3.63 3.63 12.17 12.17 0 01-5.74 1.24h-5.99a.85.85 0 01-.85-.85zm85.94-.74H204.98l6.45-7.05a18.5 18.5 0 002.78-3.89c.57-1.15.85-2.33.85-3.55 0-1.14-.25-2.13-.75-2.96a4.9 4.9 0 00-2.11-1.9c-.91-.44-2-.66-3.26-.66-1.26 0-2.52.25-3.78.75a9.55 9.55 0 00-2.97 1.8.8.8 0 00-.3.64c0 .45.4.81.85.81a.8.8 0 00.47-.17h.02c.86-.67 1.71-1.2 2.58-1.57a7.93 7.93 0 013.13-.64c1.36 0 2.4.34 3.14 1.04.73.68 1.1 1.66 1.1 2.92 0 .98-.25 1.94-.74 2.9-.5.95-1.27 2.03-2.33 3.25l-7.27 8.1c-.2.23-.32.53-.32.84v.16c0 .43.35.77.77.77h11.9a.8.8 0 000-1.59zm-40.6 0H164.38l6.45-7.05a18.46 18.46 0 002.78-3.89c.57-1.15.85-2.33.85-3.55 0-1.14-.25-2.13-.75-2.96a4.9 4.9 0 00-2.11-1.9c-.91-.44-2-.66-3.26-.66-1.26 0-2.52.25-3.78.75a9.56 9.56 0 00-2.96 1.8.8.8 0 00-.3.64c0 .45.4.81.84.81a.8.8 0 00.48-.17h.01c.86-.67 1.72-1.2 2.58-1.57a7.93 7.93 0 013.13-.64c1.36 0 2.4.34 3.14 1.04.73.68 1.1 1.66 1.1 2.92 0 .98-.25 1.94-.74 2.9-.49.95-1.27 2.03-2.33 3.25l-7.27 8.1c-.2.23-.32.53-.32.84v.16c0 .43.35.77.78.77h11.9a.8.8 0 000-1.59zm53.99.18c1.84 0 3.2-.75 4.1-2.26.88-1.51 1.33-3.86 1.33-7.04s-.44-5.51-1.32-7a4.44 4.44 0 00-4.11-2.24c-1.84 0-3.2.75-4.1 2.25-.88 1.5-1.33 3.83-1.33 6.99s.45 5.5 1.33 7.02a4.43 4.43 0 004.1 2.28zm-40.2 0c1.84 0 3.2-.75 4.1-2.26.88-1.51 1.33-3.86 1.33-7.04s-.44-5.51-1.32-7a4.44 4.44 0 00-4.11-2.24c-1.84 0-3.21.75-4.1 2.25-.89 1.5-1.34 3.83-1.34 6.99s.45 5.5 1.34 7.02a4.43 4.43 0 004.1 2.28zm-57.3-.2h4.92c2.9 0 5.09-.77 6.55-2.29 1.45-1.52 2.19-3.79 2.19-6.81 0-6.02-2.91-9.03-8.74-9.03h-4.92v18.12zm-115.52-5.05a3.56 3.56 0 11.01-7.13 3.56 3.56 0 010 7.13zm248.51 0a3.56 3.56 0 11.01-7.13 3.56 3.56 0 010 7.13zm-11.15 0a3.56 3.56 0 11.01-7.13 3.56 3.56 0 010 7.13zm-248.51 0a3.56 3.56 0 11.01-7.13 3.56 3.56 0 01-.01 7.13zm11.15-5.21a1.65 1.65 0 100 3.3 1.65 1.65 0 000-3.3zm248.51 0a1.65 1.65 0 100 3.3 1.65 1.65 0 000-3.3zm-11.15 0a1.65 1.65 0 100 3.3 1.65 1.65 0 000-3.3zm-248.51 0a1.65 1.65 0 100 3.3 1.65 1.65 0 000-3.3zm150.23 3.06c-.53 0-1-.43-1-.96 0-.52.4-.95.92-.95h.08a.96.96 0 010 1.9zm13.63-30.36H140.6a.96.96 0 01-.95-.84c-.03-.23-2.6-23.23 15.42-29.65 1.41-.5 2.62-.91 3.67-1.27 4.19-1.44 5.6-1.92 7.08-3.56 1.22-1.35 1.98-3.57 1.98-5.8a7.36 7.36 0 00-7.44-7.44l-4.37.04h-7.44a.95.95 0 010-1.9l11.8-.05c5.26 0 9.36 4.1 9.36 9.35 0 2.72-.92 5.37-2.47 7.08-1.81 2-3.59 2.62-7.88 4.09-1.04.35-2.25.76-3.65 1.26-14.7 5.23-14.49 22.74-14.23 26.78h26.8a.96.96 0 010 1.91zm65.64 0h-27.68a.95.95 0 01-.95-.84c-.03-.23-2.6-23.23 15.42-29.65 1.41-.5 2.62-.91 3.67-1.27 4.19-1.44 5.6-1.92 7.08-3.56 1.22-1.35 1.98-3.57 1.98-5.8a7.36 7.36 0 00-7.44-7.44l-4.38.04h-7.43a.95.95 0 110-1.9l11.8-.05c5.25 0 9.36 4.1 9.36 9.35 0 2.72-.92 5.37-2.47 7.08-1.81 2-3.59 2.62-7.88 4.09-1.04.35-2.25.76-3.65 1.26-14.7 5.23-14.49 22.74-14.23 26.78h26.8a.96.96 0 010 1.91zm18.85 0a14.9 14.9 0 01-14.88-14.87V60a14.9 14.9 0 0114.88-14.87A14.9 14.9 0 01267.64 60v7.8a14.9 14.9 0 01-14.87 14.87zm-65.7 0c-8.2 0-14.88-6.67-14.88-14.87V60a14.9 14.9 0 0114.88-14.87A14.9 14.9 0 01201.94 60v7.8a14.9 14.9 0 01-14.87 14.87zm-143.41-.14h-9.07a.95.95 0 110-1.9h9.06c7 0 12.4-2.75 15.25-7.74a16.06 16.06 0 00-.1-15.67c-2.41-4.07-6.42-6.27-11.3-6.19l-5.38-.15a9.31 9.31 0 01.02-18.62h12.18a.96.96 0 010 1.91H42.14a7.4 7.4 0 000 14.8l5.37.16c5.56-.09 10.16 2.43 12.93 7.11 3.14 5.3 3.19 12.21.12 17.6-3.2 5.6-9.2 8.7-16.9 8.7zM1.04 49.48a.95.95 0 01-.18-.55v-15.6c0-.52.43-.95.96-.95h27.52a.96.96 0 010 1.91H2.77v14.64l-.01.16h13.22a.95.95 0 010 1.9H2.78v29.6h26.24a.95.95 0 010 1.9H1.82a.95.95 0 01-.96-.95v-31.5c0-.2.07-.4.18-.56zM81.28 82.5a15.2 15.2 0 01-15.2-15.19V33.27a.95.95 0 111.92 0V67.3a13.3 13.3 0 0013.28 13.28A13.3 13.3 0 0094.56 67.3V33.27a.95.95 0 111.91 0V67.3c0 8.38-6.81 15.2-15.2 15.2zm31.68 0h-11.72a.95.95 0 110-1.9h11.72c7.92 0 14.37-6.45 14.37-14.38V48.67c0-7.93-6.45-14.38-14.37-14.38h-11.24a.95.95 0 110-1.9h11.24a16.3 16.3 0 0116.28 16.28V66.2a16.3 16.3 0 01-16.28 16.28zm74.1-35.45A12.98 12.98 0 00174.1 60v7.8c0 7.15 5.82 12.96 12.97 12.96 7.14 0 12.96-5.81 12.96-12.96V60c0-7.14-5.82-12.96-12.96-12.96zm65.7 0A12.98 12.98 0 00239.8 60v7.8c0 7.15 5.82 12.96 12.97 12.96s12.96-5.81 12.96-12.96V60c0-7.14-5.81-12.96-12.96-12.96zM135.54 57.73c-.53 0-1-.43-1-.96s.39-.95.92-.95h.08a.95.95 0 110 1.9zm117.25-18c-4.67 0-9.13-2.25-11.93-6a.96.96 0 011.53-1.14 12.86 12.86 0 0010.4 5.22c4.12 0 7.9-1.89 10.38-5.18a.95.95 0 111.52 1.14 14.76 14.76 0 01-11.9 5.95zm-65.7 0c-4.74 0-9.1-2.2-11.93-6a.96.96 0 011.53-1.14 12.86 12.86 0 0010.4 5.22c4.12 0 7.9-1.89 10.37-5.18a.96.96 0 011.53 1.14 14.76 14.76 0 01-11.9 5.95zm79.6-33.4l-9.7-.01a.95.95 0 00-.95.95 8.44 8.44 0 01-8.43 8.43h-12.33l-.08-.02h-67.62L33.3 15.65c-.06 0-.1.02-.15.03H20.9a8.44 8.44 0 01-8.43-8.43.95.95 0 00-.96-.96h-9.7a.95.95 0 100 1.91h8.8A10.35 10.35 0 0020.9 17.6h146.82l79.87.02c5.37 0 9.8-4.13 10.3-9.38h8.79a.95.95 0 100-1.9zM1.83 2.22h9.94a.95.95 0 100-1.9H1.82a.95.95 0 100 1.9zm254.93 0h9.94a.95.95 0 100-1.9h-9.94a.95.95 0 000 1.9z"/>
</svg>';
					echo '<h1><strong>Docência Online:</strong> Cenários e desafios da<br> Educação em Rede</h1>';
					echo '<h2>XVII Congresso Brasileiro de Ensino Superior a Distância • Esud 2020  <br> VI Congresso Internacional de Educação Superior a Distância • Ciesud 2020</h2>';
				echo '</div>';
			echo '</div>';
			
		} else {

			echo '<div class="container">';
				echo '<h1 class="titulo-pagina">';
					if (is_home() && ! is_front_page()) {
						echo 'Notícias';
					} else {
						echo get_the_title();
					}
				echo '</h1>';
			echo '</div>';

		}
		echo '</div>';

	echo '</header>';

