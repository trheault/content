<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php if (!$page && $title): ?>
  <header>
    <?php print render($title_prefix); ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php print render($title_suffix); ?>
  </header>
  <?php endif; ?>
  
  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
  <?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_tags']);
	print render($content['body']);
  ?>
  </div>
  <h2 id="answers-title" class="title">Answer</h2>
  <?php 
  global $user;
	$flag = flag_get_flag('release');
  if ($flag->is_flagged($node->nid)) {
	  print render($content['field_answer']);
  }	else {
    if (isset($content['field_answer'])) {
      print '<div class="messages warning"><strong>This answer to this question is under review.</strong>  Once reviewed it may be posted online and the question author will be emailed the answer.  At this time the answer is only visible to IDFG Staff.</div>';
      if (in_array('idfg', array_values($user->roles))) {
       print render($content['field_answer']);
      }
    }
    else {
      if (in_array('idfg', array_values($user->roles))) {
        print '<div class="messages error"><strong>This question is awaiting an answer.</strong><br/><br/><div class="answer_field_answer_question"><a href="https://fishandgame.idaho.gov/content/node/'.arg(1).'/edit" title="Answer, edit or reassign">Answer, edit or reassign this question</a></div></div>';
      } else {
        print '<div class="messages warning"><strong>This question is awaiting an answer.</strong> We are working to get an answer to this question.</div>';
      }
    }
	}	
	print render($content['field_tags']);
  //print render($content);
  ?>
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>
  </div>
</article>
<div class="answer_field_answer_question"><a href="/content/questions">&#171; Return to Questions List</a></div>