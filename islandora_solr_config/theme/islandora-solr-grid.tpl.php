<?php
/**
 * @file islandora-solr-grid.tpl.php
 * Islandora solr primary results template file for
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com/drupal .
 * - $user: The user object.
 * - $solr_default_img: default solr image. Used when no thumbnail is available.
 *
 * - $results: Primary profile results array
 */
?>

<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
  <div class="islandora-solr-search-results">
    <div class="islandora-solr-grid clearfix">
    <?php foreach($results as $result): ?>
      <dl class="solr-grid-field">
        <dt class="solr-grid-thumb">
          <?php $image = '<img src="' . $base_url . '/islandora/object/' . $result['PID']['value'] . '/datastream/TN"' . ' onerror="this.src=\'' . $solr_default_img . '\'" />'; ?>
          <?php print l($image, 'islandora/object/' . $result['PID']['value'], array('html' => TRUE)); ?>
        </dt>
        <dd class="solr-grid-caption">
          <?php $title = isset($result['fgs.label']['value']) ? $result['fgs.label']['value'] : ''; ?>
          <?php print l($title, 'islandora/object/' . htmlspecialchars($result['PID']['value'], ENT_QUOTES, 'utf-8')); ?>
        </dd>
      </dl>
    <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>