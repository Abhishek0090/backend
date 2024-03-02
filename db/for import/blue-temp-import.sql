DROP TABLE IF EXISTS `assignment_art`;
CREATE TABLE IF NOT EXISTS `assignment_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `copy` text NOT NULL,
  `city` text,
  `title` text NOT NULL,
  `project_category` text NOT NULL,
  `instructions` text NOT NULL,
  `budget` text NOT NULL,
  `deadline` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `file` text NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_ed`;
CREATE TABLE IF NOT EXISTS `assignment_ed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `city` text,
  `copy` text NOT NULL,
  `software` text NOT NULL,
  `type` text NOT NULL,
  `deadline` text NOT NULL,
  `submission_datetime` text NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `instructions` text NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `file` text NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_freelance`;
CREATE TABLE IF NOT EXISTS `assignment_freelance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `stream` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `course` text NOT NULL,
  `level` text NOT NULL,
  `type` text NOT NULL,
  `subject_tags` text NOT NULL,
  `deadline` text NOT NULL,
  `budget` text NOT NULL,
  `files` text NOT NULL,
  `submission_date` text NOT NULL,
  `project_manager` text,
  `freelancer` text,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_inquiries`;
CREATE TABLE IF NOT EXISTS `assignment_inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_map`;
CREATE TABLE IF NOT EXISTS `assignment_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_typing`;
CREATE TABLE IF NOT EXISTS `assignment_typing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `copy` text NOT NULL,
  `city` text,
  `font` text NOT NULL,
  `font_size` text NOT NULL,
  `font_color` text NOT NULL,
  `orientation` text NOT NULL,
  `page_size` text NOT NULL,
  `margins` text NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `calculations` text NOT NULL,
  `budget` int(11) NOT NULL,
  `deadline_datetime` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `instructions` text,
  `is_active` int(11) NOT NULL,
  `file` text NOT NULL,
  `writing_manager` text,
  `writer` text,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assignment_writing`;
CREATE TABLE IF NOT EXISTS `assignment_writing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `city` text,
  `ink_color` text NOT NULL,
  `submission_datetime` text NOT NULL,
  `delivery_datetime` text NOT NULL,
  `copy` text NOT NULL,
  `sheets` text NOT NULL,
  `sides` text,
  `diagrams` text NOT NULL,
  `content` text NOT NULL,
  `budget` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `instructions` text NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `assign_to_freelancer`;
CREATE TABLE IF NOT EXISTS `assign_to_freelancer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancers_map`;
CREATE TABLE IF NOT EXISTS `freelancers_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `country_name` text NOT NULL,
  `country_code` int(11) NOT NULL,
  `number` text NOT NULL,
  `number_verified` tinyint(1) NOT NULL,
  `technical` tinyint(1) NOT NULL DEFAULT '0',
  `non technical` tinyint(1) NOT NULL DEFAULT '0',
  `writer` tinyint(1) NOT NULL DEFAULT '0',
  `technical_form_filled` tinyint(4) DEFAULT '1',
  `technical_interview_conducted` tinyint(4) DEFAULT '0',
  `technical_agreement_sent` tinyint(4) DEFAULT '0',
  `technical_agreement_received` tinyint(4) DEFAULT '0',
  `technical_is_approved` tinyint(1) DEFAULT '0',
  `non_technical_form_filled` tinyint(4) DEFAULT '1',
  `non_technical_interview_conducted` tinyint(4) DEFAULT '0',
  `non_technical_agreement_sent` tinyint(4) DEFAULT '0',
  `non_technical_agreement_received` tinyint(4) DEFAULT '0',
  `non_technical_is_approved` tinyint(4) DEFAULT '0',
  `writer_form_filled` tinyint(4) DEFAULT '1',
  `writer_interview_conducted` tinyint(4) DEFAULT '0',
  `writer_agreement_sent` tinyint(4) DEFAULT '0',
  `writer_agreement_received` tinyint(4) DEFAULT '0',
  `writer_is_approved` tinyint(4) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT NULL,
  `firstname` text,
  `lastname` text,
  `gender` text,
  `whatsapp` text,
  `address` text,
  `street` text,
  `city` text,
  `state` text,
  `pincode` text,
  `agreed` tinyint(1) DEFAULT '0',
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancers_nontechnical`;
CREATE TABLE IF NOT EXISTS `freelancers_nontechnical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `subject_tags` text NOT NULL,
  `past_experience` text NOT NULL,
  `typing_speed` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `experience` text NOT NULL,
  `past_work_files` text NOT NULL,
  `resume` text NOT NULL,
  `profile_photo` text NOT NULL,
  `date_of_submission` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancers_technical`;
CREATE TABLE IF NOT EXISTS `freelancers_technical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `subject_tags` text NOT NULL,
  `past_experience` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `experience` text NOT NULL,
  `past_work_files` text NOT NULL,
  `resume` text NOT NULL,
  `profile_photo` text,
  `date_of_submission` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancers_writer`;
CREATE TABLE IF NOT EXISTS `freelancers_writer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text NOT NULL,
  `writing` tinyint(4) NOT NULL,
  `diagram` tinyint(4) NOT NULL,
  `ed` tinyint(4) NOT NULL,
  `typing` tinyint(4) NOT NULL,
  `art` tinyint(4) NOT NULL,
  `writing_capacity` int(11) DEFAULT NULL,
  `writing_1day_cost` decimal(11,1) DEFAULT NULL,
  `writing_2day_cost` decimal(11,1) DEFAULT NULL,
  `writing_3day_cost` decimal(11,1) DEFAULT NULL,
  `writing_sample` text,
  `diagram_cost` decimal(11,1) DEFAULT NULL,
  `diagram_sample` text,
  `ed_cost` decimal(11,1) DEFAULT NULL,
  `ed_sample` text,
  `typing_cost` decimal(11,1) DEFAULT NULL,
  `typing_speed` int(11) DEFAULT NULL,
  `art_type_of_models` text,
  `art_cost` decimal(11,1) DEFAULT NULL,
  `art_sample` text,
  `bio` text NOT NULL,
  `profile_photo` text,
  `date_of_submission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancer_eligible`;
CREATE TABLE IF NOT EXISTS `freelancer_eligible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `made_on` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancer_otp_email`;
CREATE TABLE IF NOT EXISTS `freelancer_otp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `otp` int(11) NOT NULL,
  `category` text,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancer_otp_number`;
CREATE TABLE IF NOT EXISTS `freelancer_otp_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) DEFAULT NULL,
  `number` bigint(20) NOT NULL,
  `otp` int(11) NOT NULL,
  `category` text,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancer_reward_claims`;
CREATE TABLE IF NOT EXISTS `freelancer_reward_claims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `claim_datetime` datetime NOT NULL,
  `claimed` int(11) NOT NULL,
  `sent` int(11) NOT NULL DEFAULT '0',
  `received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `freelancer_swing`;
CREATE TABLE IF NOT EXISTS `freelancer_swing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `swing_status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `student_otp_email`;
CREATE TABLE IF NOT EXISTS `student_otp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `student_otp_number`;
CREATE TABLE IF NOT EXISTS `student_otp_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `number` bigint(20) NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email_old` text NOT NULL,
  `email` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `number_whatsapp` bigint(20) NOT NULL,
  `city` text NOT NULL,
  `role` text NOT NULL,
  `is_technical` tinyint(4) NOT NULL,
  `is_non_technical` tinyint(4) NOT NULL,
  `is_writer` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `uploaded_files_freelancer`;
CREATE TABLE IF NOT EXISTS `uploaded_files_freelancer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_source` text NOT NULL,
  `file_name` text NOT NULL,
  `file_upload_date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `uploaded_files_user`;
CREATE TABLE IF NOT EXISTS `uploaded_files_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_source` text NOT NULL,
  `file_name` text NOT NULL,
  `file_upload_date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `college` text,
  `email` text NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `country_name` text NOT NULL,
  `country_code` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `number_verified` tinyint(1) NOT NULL DEFAULT '0',
  `address` text,
  `is_accepted` tinyint(1) NOT NULL,
  `signin_method` text NOT NULL,
  `password` text NOT NULL,
  `wallet` int(11) NOT NULL,
  `date_of_birth` text,
  `created` text,
  `agreed` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_bought_writer`;
CREATE TABLE IF NOT EXISTS `user_bought_writer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_wallet_transactions`;
CREATE TABLE IF NOT EXISTS `user_wallet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `coins` int(11) NOT NULL,
  `date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `writer_bought_user`;
CREATE TABLE IF NOT EXISTS `writer_bought_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `assignment_type` text NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;