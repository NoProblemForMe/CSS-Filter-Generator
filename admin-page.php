<div class="wrap">
    <!-- Page title and description -->
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p><?php _e('Passen Sie die Filterwerte an, um die Farben von Icons und Elementen in Ihrem WordPress-Theme zu ändern. Ideal für die Erstellung benutzerdefinierter Stylesheets und die Farbanpassung von Icons.', 'css-filter-generator'); ?></p>

    <!-- Form for entering target color and calculating filter -->
    <div class="form-section">
        <form method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="target-color"><?php _e('Zielfarbe', 'css-filter-generator'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="target-color" name="target_color" value="<?php echo isset($_POST['target_color']) ? esc_attr(\sanitize_hex_color($_POST['target_color'])) : '#00a4d6'; ?>" class="regular-text ltr" />
                        <p class="description"><?php _e('Geben Sie den HEX-Wert der gewünschten Farbe ein.', 'css-filter-generator'); ?></p>
                        <button type="button" class="button execute"><?php _e('Filter berechnen', 'css-filter-generator'); ?></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Section to preview the original and filtered colors -->
    <div id="preview-section">
        <h2><?php _e('Vorschau', 'css-filter-generator'); ?></h2>
        <div class="pixel-container">
            <div class="pixel realPixel"></div>
            <p class="pixel-info"><?php _e('Reales Pixel, Farbe angewendet durch CSS background-color.', 'css-filter-generator'); ?></p>
        </div>
        <div class="pixel-container">
            <div class="pixel filterPixel"></div>
            <p class="pixel-info"><?php _e('Gefiltertes Pixel, Farbe angewendet durch CSS filter.', 'css-filter-generator'); ?></p>
        </div>
        <div class="filter-detail">
            <strong><?php _e('Filter Details:', 'css-filter-generator'); ?></strong> <span class="filterDetail"></span>
            <br>
            <div id="copyMessage" style="display:none; color: green; margin-top: 10px;"><?php _e('Filterwert kopiert!', 'css-filter-generator'); ?></div>
            <button class="copy-button" onclick="copyToClipboard('.filterDetail')" id="copyButton"><?php _e('In Zwischenablage kopieren', 'css-filter-generator'); ?></button>
        </div>
        <div class="loss-detail"><strong><?php _e('Farbverlust:', 'css-filter-generator'); ?></strong> <span class="lossDetail"></span></div>
    </div>

    <!-- Information about the plugin and credits -->
    <div class="about-section">
        <h2><?php _e('Über dieses Plugin', 'css-filter-generator'); ?></h2>
        <p><?php _e('Das Ziel war es, mit img-Tags eingebunde Icons individuell einzufärben. Für eine korrekte Funktionsweise muss die Startfarbe Schwarz sein. Falls Ihre Icon-Sammlung nicht schwarz ist, können Sie "brightness(0) saturate(100%)" Ihrer Filtereigenschaft voranstellen, um die Icon-Sammlung zunächst in Schwarz umzuwandeln.', 'css-filter-generator'); ?></p>
        <p><?php _e('Diese Lösung basiert auf der Arbeit und den Beiträgen verschiedener Entwickler, besonderer Dank geht an MultiplyByZer0 für den Beitrag auf Stack Overflow.', 'css-filter-generator'); ?> <a href="https://stackoverflow.com/a/43960991/604861" target="_blank"><?php _e('Siehe Beitrag', 'css-filter-generator'); ?></a>.</p>
    </div>
</div>