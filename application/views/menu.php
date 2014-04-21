<script type="text/javascript" src="<?=base_url()?>js/moment.js"></script>

<?php 
	if ($this->session->userdata('is_logged_in')){

		echo 'Hello, '.$this->session->userdata('name').' ('. anchor(base_url()."users/logout/","logout") .') | ';
		echo anchor(base_url(), 'Blog');	
		echo ' | ';
		echo anchor(base_url().'blog/entry/', 'New Entry');
		echo ' | ';
		echo anchor(base_url().'comment/false_status/', 'Comments disabled');
		echo ' | ';
		echo anchor(base_url().'maintenance/', 'Maintenance of comments');
	}
	else{
		echo anchor(base_url().'users/signin/','Admin').' | ';	
		echo anchor(base_url(), 'All Entries');		
		echo '<hr />';
	}		
?>