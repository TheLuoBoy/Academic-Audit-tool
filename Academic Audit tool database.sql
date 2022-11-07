-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Academic_Audit_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Academic_Audit_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Academic_Audit_db` DEFAULT CHARACTER SET utf8 ;
USE `Academic_Audit_db` ;

-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`staff_info` (
  `staff_id` INT NOT NULL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `gender` ENUM('MALE', 'FEMALE') NULL,
  `date_birth` DATE NULL,
  `email` VARCHAR(45) NULL,
  `tel` VARCHAR(45) NULL,
  PRIMARY KEY (`staff_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`degrees_obtained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`degrees_obtained` (
  `degree_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NULL,
  `institution` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `qualifiication` VARCHAR(45) NULL,
  `year_completion` DATE NULL,
  `study_field` VARCHAR(45) NULL,
  PRIMARY KEY (`degree_id`),
  INDEX `fk_degree_staff_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_degree_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`on_going_degrees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`on_going_degrees` (
  `ongoing_degree_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NULL,
  `level` ENUM('BACHELORS', 'MASTER', 'PhD') NULL,
  `start_year` DATE NULL,
  `sponsor_name` VARCHAR(45) NULL,
  `progress_comment` VARCHAR(1000) NULL,
  PRIMARY KEY (`ongoing_degree_id`),
  INDEX `fk_ongoing_degree_staff_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_ongoing_degree_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`faculties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`faculties` (
  `faculty_id` INT NOT NULL,
  `name` VARCHAR(100) NULL,
  PRIMARY KEY (`faculty_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`departments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`departments` (
  `department_id` INT NOT NULL AUTO_INCREMENT,
  `faculty_id` INT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`department_id`),
  INDEX `fk_dept_faculty_idx` (`faculty_id` ASC) VISIBLE,
  CONSTRAINT `fk_dept_faculty`
    FOREIGN KEY (`faculty_id`)
    REFERENCES `Academic_Audit_db`.`faculties` (`faculty_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`positions_held`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`positions_held` (
  `position_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NULL,
  `position` VARCHAR(45) NULL,
  `department_id` INT NULL,
  `appointment_date` DATE NULL,
  `last_promotion_date` DATE NULL,
  `appraisal_recommendation` VARCHAR(100) NULL,
  `first_appointment_date` DATE NULL,
  `last_appraised_year` DATE NULL,
  `comment` VARCHAR(100) NULL,
  PRIMARY KEY (`position_id`),
  INDEX `fk_pos_staff_idx` (`staff_id` ASC) VISIBLE,
  INDEX `fk_pos_depart_idx` (`department_id` ASC) VISIBLE,
  CONSTRAINT `fk_pos_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pos_depart`
    FOREIGN KEY (`department_id`)
    REFERENCES `Academic_Audit_db`.`departments` (`department_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`weekly_workload_analysis` (
  `workload_id` INT NOT NULL,
  `acamadic_year` DATE NULL,
  `week_number` INT NULL,
  `staff_id` INT NULL,
  `lecture_hours` FLOAT NULL,
  `practical_hours` FLOAT NULL,
  `tutorials_seminars` FLOAT NULL,
  `preparations` FLOAT NULL,
  `marking` FLOAT NULL,
  `others` FLOAT NULL,
  `challenge_solutions` BLOB NULL,
  PRIMARY KEY (`workload_id`),
  INDEX `fk_staff_workload_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_staff_workload`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`supervisions_completed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`supervisions_completed` (
  `student_id` VARCHAR(100) NOT NULL,
  `student_fname` VARCHAR(45) NULL,
  `student_lname` VARCHAR(45) NULL,
  `research_title` VARCHAR(100) NULL,
  `start_year` DATE NULL,
  `completion_year` DATE NULL,
  `nature_supervision` ENUM('PRIMARY SUPERVISOR', 'CO-SUPERVISOR') NULL,
  `awarding_university` VARCHAR(100) NULL,
  `challenge_solution` BLOB NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`other_outreach_programs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`other_outreach_programs` (
  `program_id` INT NOT NULL,
  `program_title` VARCHAR(100) NULL,
  `date_carrriedout` DATE NULL,
  `program_location` VARCHAR(45) NULL,
  `total_beneficiaries` INT NULL,
  `challenge_solution` BLOB NULL,
  PRIMARY KEY (`program_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`conferences_attended`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`conferences_attended` (
  `conference_id` INT NOT NULL,
  `conference_name` VARCHAR(45) NULL,
  `role` ENUM('ATTENDEE', 'ORGANIZER', 'PRESENTER') NULL,
  `location` VARCHAR(45) NULL,
  `url` VARCHAR(100) NULL,
  PRIMARY KEY (`conference_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`on_going_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`on_going_research` (
  `research_id` INT NOT NULL,
  `grant_number` INT NULL,
  `funder` VARCHAR(45) NULL,
  `amount` FLOAT NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `role` ENUM('PI', 'Co-I') NULL,
  `title` VARCHAR(45) NULL,
  `challenge_solution` BLOB NULL,
  PRIMARY KEY (`research_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`peer_reviewed_publications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`peer_reviewed_publications` (
  `publication_id` INT NOT NULL,
  `author` VARCHAR(145) NULL,
  `title` VARCHAR(100) NULL,
  `publication_year` DATE NULL,
  `type` ENUM('JOURNAL', 'BOOK', 'BOOK CHAPTER', 'CONFERENCE PROCEEDING') NULL,
  `publisher` VARCHAR(100) NULL,
  `volume_number` INT NULL,
  `ISBN` VARCHAR(45) NULL,
  PRIMARY KEY (`publication_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`scientific_communications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`scientific_communications` (
  `com_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `platform_name` VARCHAR(45) NULL,
  `com_date` DATE NULL,
  `topic` VARCHAR(45) NULL,
  `challenge_solutions` BLOB NULL,
  PRIMARY KEY (`com_id`, `staff_id`),
  INDEX `fk_com_staff_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_com_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`inventions_made`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`inventions_made` (
  `invention_id` INT NOT NULL,
  `invention_name` VARCHAR(100) NULL,
  `invention_year` DATE NULL,
  `patent_company` VARCHAR(45) NULL,
  `role` VARCHAR(45) NULL,
  `income_generated` FLOAT NULL,
  PRIMARY KEY (`invention_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`rank_research_teaching_env`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`rank_research_teaching_env` (
  `rank_id` INT NOT NULL,
  `category` VARCHAR(100) NULL,
  `item` VARCHAR(100) NULL,
  `qaulity` INT NULL,
  `quantity` INT NULL,
  `remarks` VARCHAR(100) NULL,
  PRIMARY KEY (`rank_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`internship_supervision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`internship_supervision` (
  `student_id` VARCHAR(45) NOT NULL,
  `student_fname` VARCHAR(45) NULL,
  `student_lname` VARCHAR(45) NULL,
  `course_pursued` VARCHAR(45) NULL,
  `company_name` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`research_collaborators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`research_collaborators` (
  `collab_id` INT NOT NULL,
  `colab_name` VARCHAR(100) NULL,
  `affiliation` VARCHAR(100) NULL,
  PRIMARY KEY (`collab_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`courses_activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`courses_activity` (
  `course_activity_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `type` ENUM('ACTIVITY', 'COURSE') NULL,
  PRIMARY KEY (`course_activity_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Sessions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Sessions` (
  `session_id` INT NOT NULL,
  `staff_id` INT NULL,
  `login_datetime` DATETIME NULL,
  `logout_datetime` DATETIME NULL,
  `session_log` BLOB NULL,
  PRIMARY KEY (`session_id`),
  INDEX `fk_session_staff_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_session_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Authentications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Authentications` (
  `username` VARCHAR(45) NOT NULL,
  `staff_id` INT NOT NULL,
  `password` VARCHAR(100) NULL,
  PRIMARY KEY (`username`),
  INDEX `fk_authen_staff_idx` (`staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_authen_staff`
    FOREIGN KEY (`staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`professional_training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`professional_training` (
  `degree_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NOT NULL,
  `institution` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `qualifiication` VARCHAR(45) NULL,
  `year_completion` DATE NULL,
  `study_field` VARCHAR(45) NULL,
  PRIMARY KEY (`degree_id`, `staff_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`completed_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`completed_research` (
  `research_id` INT NOT NULL,
  `grant_number` INT NULL,
  `funder` VARCHAR(45) NULL,
  `amount` FLOAT NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `role` ENUM('PI', 'Co-I') NULL,
  `title` VARCHAR(45) NULL,
  `number_male_beneficiaries` INT NULL,
  `number_female_beneficiaries` INT NULL,
  `challenge_solution` BLOB NULL,
  PRIMARY KEY (`research_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`invention_collaborators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`invention_collaborators` (
  `colab_id` INT NOT NULL,
  `colab_name` VARCHAR(105) NULL,
  PRIMARY KEY (`colab_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`ongoing_supervision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`ongoing_supervision` (
  `student_id` VARCHAR(100) NOT NULL,
  `student_fname` VARCHAR(45) NULL,
  `student_lname` VARCHAR(45) NULL,
  `research_title` VARCHAR(100) NULL,
  `start_year` DATE NULL,
  `nature_supervision` ENUM('PRIMARY SUPERVISOR', 'CO-SUPERVISOR') NULL,
  `university_name` VARCHAR(100) NULL,
  `challenge_solution` BLOB NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`professional_training_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`professional_training_has_staff_info` (
  `professional_training_degree_id` INT NOT NULL,
  `professional_training_staff_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`professional_training_degree_id`, `professional_training_staff_id`, `staff_info_staff_id`),
  INDEX `fk_professional_training_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_professional_training_has_staff_info_professional_traini_idx` (`professional_training_degree_id` ASC, `professional_training_staff_id` ASC) VISIBLE,
  CONSTRAINT `fk_professional_training_has_staff_info_professional_training1`
    FOREIGN KEY (`professional_training_degree_id` , `professional_training_staff_id`)
    REFERENCES `Academic_Audit_db`.`professional_training` (`degree_id` , `staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professional_training_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`courses_activity_sem1_has_weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`courses_activity_sem1_has_weekly_workload_analysis` (
  `courses_activity_sem1_course_activity_id` INT NOT NULL,
  `weekly_workload_analysis_workload_id` INT NOT NULL,
  PRIMARY KEY (`courses_activity_sem1_course_activity_id`, `weekly_workload_analysis_workload_id`),
  INDEX `fk_courses_activity_sem1_has_weekly_workload_analysis_weekl_idx` (`weekly_workload_analysis_workload_id` ASC) VISIBLE,
  INDEX `fk_courses_activity_sem1_has_weekly_workload_analysis_cours_idx` (`courses_activity_sem1_course_activity_id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_activity_sem1_has_weekly_workload_analysis_courses1`
    FOREIGN KEY (`courses_activity_sem1_course_activity_id`)
    REFERENCES `Academic_Audit_db`.`courses_activity` (`course_activity_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_activity_sem1_has_weekly_workload_analysis_weekly_1`
    FOREIGN KEY (`weekly_workload_analysis_workload_id`)
    REFERENCES `Academic_Audit_db`.`weekly_workload_analysis` (`workload_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`courses_activity_sem2_has_weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`courses_activity_sem2_has_weekly_workload_analysis` (
  `courses_activity_sem2_course_activity_id` INT NOT NULL,
  `weekly_workload_analysis_workload_id` INT NOT NULL,
  PRIMARY KEY (`courses_activity_sem2_course_activity_id`, `weekly_workload_analysis_workload_id`),
  INDEX `fk_courses_activity_sem2_has_weekly_workload_analysis_weekl_idx` (`weekly_workload_analysis_workload_id` ASC) VISIBLE,
  INDEX `fk_courses_activity_sem2_has_weekly_workload_analysis_cours_idx` (`courses_activity_sem2_course_activity_id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_activity_sem2_has_weekly_workload_analysis_weekly_1`
    FOREIGN KEY (`weekly_workload_analysis_workload_id`)
    REFERENCES `Academic_Audit_db`.`weekly_workload_analysis` (`workload_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_activity_sem2_has_weekly_workload_analysis_courses1`
    FOREIGN KEY (`courses_activity_sem2_course_activity_id`)
    REFERENCES `Academic_Audit_db`.`courses_activity` (`course_activity_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`ongoing_supervision_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`ongoing_supervision_has_staff_info` (
  `ongoing_supervision_student_id` VARCHAR(100) NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`ongoing_supervision_student_id`, `staff_info_staff_id`),
  INDEX `fk_ongoing_supervision_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_ongoing_supervision_has_staff_info_ongoing_supervision1_idx` (`ongoing_supervision_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_ongoing_supervision_has_staff_info_ongoing_supervision1`
    FOREIGN KEY (`ongoing_supervision_student_id`)
    REFERENCES `Academic_Audit_db`.`ongoing_supervision` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ongoing_supervision_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`supervisions_completed_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`supervisions_completed_has_staff_info` (
  `supervisions_completed_student_id` VARCHAR(100) NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`supervisions_completed_student_id`, `staff_info_staff_id`),
  INDEX `fk_supervisions_completed_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_supervisions_completed_has_staff_info_supervisions_compl_idx` (`supervisions_completed_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_supervisions_completed_has_staff_info_supervisions_complet1`
    FOREIGN KEY (`supervisions_completed_student_id`)
    REFERENCES `Academic_Audit_db`.`supervisions_completed` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supervisions_completed_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`peer_reviewed_publications_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`peer_reviewed_publications_has_staff_info` (
  `peer_reviewed_publications_publication_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`peer_reviewed_publications_publication_id`, `staff_info_staff_id`),
  INDEX `fk_peer_reviewed_publications_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_peer_reviewed_publications_has_staff_info_peer_reviewed__idx` (`peer_reviewed_publications_publication_id` ASC) VISIBLE,
  CONSTRAINT `fk_peer_reviewed_publications_has_staff_info_peer_reviewed_pu1`
    FOREIGN KEY (`peer_reviewed_publications_publication_id`)
    REFERENCES `Academic_Audit_db`.`peer_reviewed_publications` (`publication_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peer_reviewed_publications_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`inventions_made_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`inventions_made_has_staff_info` (
  `inventions_made_invention_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`inventions_made_invention_id`, `staff_info_staff_id`),
  INDEX `fk_inventions_made_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_inventions_made_has_staff_info_inventions_made1_idx` (`inventions_made_invention_id` ASC) VISIBLE,
  CONSTRAINT `fk_inventions_made_has_staff_info_inventions_made1`
    FOREIGN KEY (`inventions_made_invention_id`)
    REFERENCES `Academic_Audit_db`.`inventions_made` (`invention_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventions_made_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`invention_collaborators_has_inventions_made`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`invention_collaborators_has_inventions_made` (
  `invention_collaborators_colab_id` INT NOT NULL,
  `inventions_made_invention_id` INT NOT NULL,
  PRIMARY KEY (`invention_collaborators_colab_id`, `inventions_made_invention_id`),
  INDEX `fk_invention_collaborators_has_inventions_made_inventions_m_idx` (`inventions_made_invention_id` ASC) VISIBLE,
  INDEX `fk_invention_collaborators_has_inventions_made_invention_co_idx` (`invention_collaborators_colab_id` ASC) VISIBLE,
  CONSTRAINT `fk_invention_collaborators_has_inventions_made_invention_coll1`
    FOREIGN KEY (`invention_collaborators_colab_id`)
    REFERENCES `Academic_Audit_db`.`invention_collaborators` (`colab_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invention_collaborators_has_inventions_made_inventions_made1`
    FOREIGN KEY (`inventions_made_invention_id`)
    REFERENCES `Academic_Audit_db`.`inventions_made` (`invention_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`conferences_attended_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`conferences_attended_has_staff_info` (
  `conferences_attended_conference_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`conferences_attended_conference_id`, `staff_info_staff_id`),
  INDEX `fk_conferences_attended_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_conferences_attended_has_staff_info_conferences_attended_idx` (`conferences_attended_conference_id` ASC) VISIBLE,
  CONSTRAINT `fk_conferences_attended_has_staff_info_conferences_attended1`
    FOREIGN KEY (`conferences_attended_conference_id`)
    REFERENCES `Academic_Audit_db`.`conferences_attended` (`conference_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conferences_attended_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`other_outreach_programs_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`other_outreach_programs_has_staff_info` (
  `other_outreach_programs_program_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`other_outreach_programs_program_id`, `staff_info_staff_id`),
  INDEX `fk_other_outreach_programs_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_other_outreach_programs_has_staff_info_other_outreach_pr_idx` (`other_outreach_programs_program_id` ASC) VISIBLE,
  CONSTRAINT `fk_other_outreach_programs_has_staff_info_other_outreach_prog1`
    FOREIGN KEY (`other_outreach_programs_program_id`)
    REFERENCES `Academic_Audit_db`.`other_outreach_programs` (`program_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_other_outreach_programs_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`internship_supervision_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`internship_supervision_has_staff_info` (
  `internship_supervision_student_id` VARCHAR(45) NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`internship_supervision_student_id`, `staff_info_staff_id`),
  INDEX `fk_internship_supervision_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_internship_supervision_has_staff_info_internship_supervi_idx` (`internship_supervision_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_internship_supervision_has_staff_info_internship_supervisi1`
    FOREIGN KEY (`internship_supervision_student_id`)
    REFERENCES `Academic_Audit_db`.`internship_supervision` (`student_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_internship_supervision_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`completed_research_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`completed_research_has_staff_info` (
  `completed_research_research_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`completed_research_research_id`, `staff_info_staff_id`),
  INDEX `fk_completed_research_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_completed_research_has_staff_info_completed_research1_idx` (`completed_research_research_id` ASC) VISIBLE,
  CONSTRAINT `fk_completed_research_has_staff_info_completed_research1`
    FOREIGN KEY (`completed_research_research_id`)
    REFERENCES `Academic_Audit_db`.`completed_research` (`research_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_completed_research_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`on_going_research_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`on_going_research_has_staff_info` (
  `on_going_research_research_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`on_going_research_research_id`, `staff_info_staff_id`),
  INDEX `fk_on_going_research_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_on_going_research_has_staff_info_on_going_research1_idx` (`on_going_research_research_id` ASC) VISIBLE,
  CONSTRAINT `fk_on_going_research_has_staff_info_on_going_research1`
    FOREIGN KEY (`on_going_research_research_id`)
    REFERENCES `Academic_Audit_db`.`on_going_research` (`research_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_on_going_research_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`research_collaborators_has_on_going_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`research_collaborators_has_on_going_research` (
  `research_collaborators_collab_id` INT NOT NULL,
  `on_going_research_research_id` INT NOT NULL,
  PRIMARY KEY (`research_collaborators_collab_id`, `on_going_research_research_id`),
  INDEX `fk_research_collaborators_has_on_going_research_on_going_re_idx` (`on_going_research_research_id` ASC) VISIBLE,
  INDEX `fk_research_collaborators_has_on_going_research_research_co_idx` (`research_collaborators_collab_id` ASC) VISIBLE,
  CONSTRAINT `fk_research_collaborators_has_on_going_research_research_coll1`
    FOREIGN KEY (`research_collaborators_collab_id`)
    REFERENCES `Academic_Audit_db`.`research_collaborators` (`collab_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_research_collaborators_has_on_going_research_on_going_rese1`
    FOREIGN KEY (`on_going_research_research_id`)
    REFERENCES `Academic_Audit_db`.`on_going_research` (`research_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`rank_research_teaching_env_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`rank_research_teaching_env_has_staff_info` (
  `rank_research_teaching_env_rank_id` INT NOT NULL,
  `staff_info_staff_id` INT NOT NULL,
  PRIMARY KEY (`rank_research_teaching_env_rank_id`, `staff_info_staff_id`),
  INDEX `fk_rank_research_teaching_env_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_rank_research_teaching_env_has_staff_info_rank_research__idx` (`rank_research_teaching_env_rank_id` ASC) VISIBLE,
  CONSTRAINT `fk_rank_research_teaching_env_has_staff_info_rank_research_te1`
    FOREIGN KEY (`rank_research_teaching_env_rank_id`)
    REFERENCES `Academic_Audit_db`.`rank_research_teaching_env` (`rank_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rank_research_teaching_env_has_staff_info_staff_info1`
    FOREIGN KEY (`staff_info_staff_id`)
    REFERENCES `Academic_Audit_db`.`staff_info` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Qualifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Qualifications` (
  `qualification_id` INT NOT NULL,
  `name` VARCHAR(100) NULL,
  PRIMARY KEY (`qualification_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Qualifications_has_on_going_degrees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Qualifications_has_on_going_degrees` (
  `Qualifications_qualification_id` INT NOT NULL,
  `on_going_degrees_ongoing_degree_id` INT NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `on_going_degrees_ongoing_degree_id`),
  INDEX `fk_Qualifications_has_on_going_degrees_on_going_degrees1_idx` (`on_going_degrees_ongoing_degree_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_on_going_degrees_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_on_going_degrees_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `Academic_Audit_db`.`Qualifications` (`qualification_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Qualifications_has_on_going_degrees_on_going_degrees1`
    FOREIGN KEY (`on_going_degrees_ongoing_degree_id`)
    REFERENCES `Academic_Audit_db`.`on_going_degrees` (`ongoing_degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Qualifications_has_degrees_obtained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Qualifications_has_degrees_obtained` (
  `Qualifications_qualification_id` INT NOT NULL,
  `degrees_obtained_degree_id` INT NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `degrees_obtained_degree_id`),
  INDEX `fk_Qualifications_has_degrees_obtained_degrees_obtained1_idx` (`degrees_obtained_degree_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_degrees_obtained_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_degrees_obtained_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `Academic_Audit_db`.`Qualifications` (`qualification_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Qualifications_has_degrees_obtained_degrees_obtained1`
    FOREIGN KEY (`degrees_obtained_degree_id`)
    REFERENCES `Academic_Audit_db`.`degrees_obtained` (`degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academic_Audit_db`.`Qualifications_has_professional_training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academic_Audit_db`.`Qualifications_has_professional_training` (
  `Qualifications_qualification_id` INT NOT NULL,
  `professional_training_degree_id` INT NOT NULL,
  `professional_training_staff_id` INT NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `professional_training_degree_id`, `professional_training_staff_id`),
  INDEX `fk_Qualifications_has_professional_training_professional_tr_idx` (`professional_training_degree_id` ASC, `professional_training_staff_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_professional_training_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_professional_training_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `Academic_Audit_db`.`Qualifications` (`qualification_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Qualifications_has_professional_training_professional_trai1`
    FOREIGN KEY (`professional_training_degree_id` , `professional_training_staff_id`)
    REFERENCES `Academic_Audit_db`.`professional_training` (`degree_id` , `staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
