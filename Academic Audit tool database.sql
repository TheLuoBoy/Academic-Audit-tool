-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema academic_audit_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema academic_audit_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `academic_audit_db` DEFAULT CHARACTER SET utf8 ;
USE `academic_audit_db` ;

-- -----------------------------------------------------
-- Table `academic_audit_db`.`authentications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`authentications` (
  `username` VARCHAR(45) NOT NULL,
  `staff_id` INT(11) NOT NULL,
  `password` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`username`),
  INDEX `fk_authen_staff_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`completed_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`completed_research` (
  `research_id` INT(11) NOT NULL AUTO_INCREMENT,
  `grant_number` INT(11) NULL DEFAULT NULL,
  `funder` VARCHAR(45) NULL DEFAULT NULL,
  `amount` FLOAT NULL DEFAULT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `role` ENUM('PI', 'Co-I') NULL DEFAULT NULL,
  `title` VARCHAR(45) NULL DEFAULT NULL,
  `number_male_beneficiaries` INT(11) NULL DEFAULT NULL,
  `number_female_beneficiaries` INT(11) NULL DEFAULT NULL,
  `challenge_solution` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`research_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`completed_research_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`completed_research_has_staff_info` (
  `completed_research_research_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`completed_research_research_id`, `staff_info_staff_id`),
  INDEX `fk_completed_research_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_completed_research_has_staff_info_completed_research1_idx` (`completed_research_research_id` ASC) VISIBLE,
  CONSTRAINT `fk_completed_research_has_staff_info_completed_research1`
    FOREIGN KEY (`completed_research_research_id`)
    REFERENCES `academic_audit_db`.`completed_research` (`research_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`conferences_attended`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`conferences_attended` (
  `conference_id` INT(11) NOT NULL AUTO_INCREMENT,
  `conference_name` VARCHAR(45) NULL DEFAULT NULL,
  `role` ENUM('ATTENDEE', 'ORGANIZER', 'PRESENTER') NULL DEFAULT NULL,
  `location` VARCHAR(45) NULL DEFAULT NULL,
  `url` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`conference_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`conferences_attended_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`conferences_attended_has_staff_info` (
  `conferences_attended_conference_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`conferences_attended_conference_id`, `staff_info_staff_id`),
  INDEX `fk_conferences_attended_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_conferences_attended_has_staff_info_conferences_attended_idx` (`conferences_attended_conference_id` ASC) VISIBLE,
  CONSTRAINT `fk_conferences_attended_has_staff_info_conferences_attended1`
    FOREIGN KEY (`conferences_attended_conference_id`)
    REFERENCES `academic_audit_db`.`conferences_attended` (`conference_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`weekly_workload_analysis` (
  `workload_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NULL DEFAULT NULL,
  `lecture_hours` FLOAT NULL DEFAULT NULL,
  `practical_hours` FLOAT NULL DEFAULT NULL,
  `tutorials_seminars` FLOAT NULL DEFAULT NULL,
  `preparations` FLOAT NULL DEFAULT NULL,
  `marking` FLOAT NULL DEFAULT NULL,
  `others` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`workload_id`),
  INDEX `fk_staff_workload_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`courses_activity_sem1_has_weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`courses_activity_sem1_has_weekly_workload_analysis` (
  `weekly_workload_analysis_workload_id` INT(11) NOT NULL,
  `courses_activity_sem1_course_activity_id` INT(11) NOT NULL,
  PRIMARY KEY (`weekly_workload_analysis_workload_id`, `courses_activity_sem1_course_activity_id`),
  INDEX `fk_courses_activity_sem1_has_weekly_workload_analysis_weekl_idx` (`weekly_workload_analysis_workload_id` ASC) VISIBLE,
  INDEX `fk_courses_activity_sem1_has_weekly_workload_analysis_cours_idx` (`courses_activity_sem1_course_activity_id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_activity_sem1_has_weekly_workload_analysis_weekly_1`
    FOREIGN KEY (`weekly_workload_analysis_workload_id`)
    REFERENCES `academic_audit_db`.`weekly_workload_analysis` (`workload_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`courses_activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`courses_activity` (
  `course_activity_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `type` ENUM('ACTIVITY', 'COURSE') NULL DEFAULT NULL,
  PRIMARY KEY (`course_activity_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`courses_activity_sem2_has_weekly_workload_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`courses_activity_sem2_has_weekly_workload_analysis` (
  `weekly_workload_analysis_workload_id` INT(11) NOT NULL,
  `courses_activity_sem2_course_activity_id` INT(11) NOT NULL,
  PRIMARY KEY (`weekly_workload_analysis_workload_id`, `courses_activity_sem2_course_activity_id`),
  INDEX `fk_courses_activity_sem2_has_weekly_workload_analysis_weekl_idx` (`weekly_workload_analysis_workload_id` ASC) VISIBLE,
  INDEX `fk_courses_activity_sem2_has_weekly_workload_analysis_cours_idx` (`courses_activity_sem2_course_activity_id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_activity_sem2_has_weekly_workload_analysis_weekly_1`
    FOREIGN KEY (`weekly_workload_analysis_workload_id`)
    REFERENCES `academic_audit_db`.`weekly_workload_analysis` (`workload_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`degrees_obtained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`degrees_obtained` (
  `degree_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NULL DEFAULT NULL,
  `institution` VARCHAR(45) NULL DEFAULT NULL,
  `location` VARCHAR(45) NULL DEFAULT NULL,
  `qualifiication` VARCHAR(45) NULL DEFAULT NULL,
  `year_completion` DATE NULL DEFAULT NULL,
  `study_field` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`degree_id`),
  INDEX `fk_degree_staff_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`faculties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`faculties` (
  `faculty_id` INT(11) NOT NULL,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`faculty_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`departments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`departments` (
  `department_id` INT(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`),
  INDEX `fk_dept_faculty_idx` (`faculty_id` ASC) VISIBLE,
  CONSTRAINT `fk_dept_faculty`
    FOREIGN KEY (`faculty_id`)
    REFERENCES `academic_audit_db`.`faculties` (`faculty_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`internship_supervision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`internship_supervision` (
  `student_id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_fname` VARCHAR(45) NULL DEFAULT NULL,
  `student_lname` VARCHAR(45) NULL DEFAULT NULL,
  `course_pursued` VARCHAR(45) NULL DEFAULT NULL,
  `company_name` VARCHAR(45) NULL DEFAULT NULL,
  `location` VARCHAR(45) NULL DEFAULT NULL,
  `regNo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`internship_supervision_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`internship_supervision_has_staff_info` (
  `internship_supervision_student_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`internship_supervision_student_id`, `staff_info_staff_id`),
  INDEX `fk_internship_supervision_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_internship_supervision_has_staff_info_internship_supervi_idx` (`internship_supervision_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_internship_supervision_has_staff_info_internship_supervisi1`
    FOREIGN KEY (`internship_supervision_student_id`)
    REFERENCES `academic_audit_db`.`internship_supervision` (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`invention_collaborators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`invention_collaborators` (
  `colab_id` INT(11) NOT NULL AUTO_INCREMENT,
  `colab_name` VARCHAR(105) NULL DEFAULT NULL,
  PRIMARY KEY (`colab_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`inventions_made`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`inventions_made` (
  `invention_id` INT(11) NOT NULL AUTO_INCREMENT,
  `invention_name` VARCHAR(100) NULL DEFAULT NULL,
  `invention_year` YEAR NULL DEFAULT NULL,
  `patent_company` VARCHAR(45) NULL DEFAULT NULL,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  `income_generated` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`invention_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`invention_collaborators_has_inventions_made`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`invention_collaborators_has_inventions_made` (
  `invention_collaborators_colab_id` INT(11) NOT NULL,
  `inventions_made_invention_id` INT(11) NOT NULL,
  PRIMARY KEY (`invention_collaborators_colab_id`, `inventions_made_invention_id`),
  INDEX `fk_invention_collaborators_has_inventions_made_inventions_m_idx` (`inventions_made_invention_id` ASC) VISIBLE,
  INDEX `fk_invention_collaborators_has_inventions_made_invention_co_idx` (`invention_collaborators_colab_id` ASC) VISIBLE,
  CONSTRAINT `fk_invention_collaborators_has_inventions_made_invention_coll1`
    FOREIGN KEY (`invention_collaborators_colab_id`)
    REFERENCES `academic_audit_db`.`invention_collaborators` (`colab_id`),
  CONSTRAINT `fk_invention_collaborators_has_inventions_made_inventions_made1`
    FOREIGN KEY (`inventions_made_invention_id`)
    REFERENCES `academic_audit_db`.`inventions_made` (`invention_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`inventions_made_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`inventions_made_has_staff_info` (
  `inventions_made_invention_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`inventions_made_invention_id`, `staff_info_staff_id`),
  INDEX `fk_inventions_made_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_inventions_made_has_staff_info_inventions_made1_idx` (`inventions_made_invention_id` ASC) VISIBLE,
  CONSTRAINT `fk_inventions_made_has_staff_info_inventions_made1`
    FOREIGN KEY (`inventions_made_invention_id`)
    REFERENCES `academic_audit_db`.`inventions_made` (`invention_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`on_going_degrees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`on_going_degrees` (
  `ongoing_degree_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NULL DEFAULT NULL,
  `level` ENUM('BACHELORS', 'MASTER', 'PhD') NULL DEFAULT NULL,
  `start_year` DATE NULL DEFAULT NULL,
  `sponsor_name` VARCHAR(45) NULL DEFAULT NULL,
  `progress_comment` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`ongoing_degree_id`),
  INDEX `fk_ongoing_degree_staff_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`on_going_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`on_going_research` (
  `research_id` INT(11) NOT NULL AUTO_INCREMENT,
  `grant_number` INT(11) NULL DEFAULT NULL,
  `funder` VARCHAR(45) NULL DEFAULT NULL,
  `amount` FLOAT NULL DEFAULT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `role` ENUM('PI', 'Co-I') NULL DEFAULT NULL,
  `title` VARCHAR(45) NULL DEFAULT NULL,
  `challenge_solution` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`research_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`on_going_research_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`on_going_research_has_staff_info` (
  `on_going_research_research_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`on_going_research_research_id`, `staff_info_staff_id`),
  INDEX `fk_on_going_research_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_on_going_research_has_staff_info_on_going_research1_idx` (`on_going_research_research_id` ASC) VISIBLE,
  CONSTRAINT `fk_on_going_research_has_staff_info_on_going_research1`
    FOREIGN KEY (`on_going_research_research_id`)
    REFERENCES `academic_audit_db`.`on_going_research` (`research_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`ongoing_supervision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`ongoing_supervision` (
  `student_id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_fname` VARCHAR(45) NULL DEFAULT NULL,
  `student_lname` VARCHAR(45) NULL DEFAULT NULL,
  `research_title` VARCHAR(100) NULL DEFAULT NULL,
  `start_year` DATE NULL DEFAULT NULL,
  `nature_supervision` ENUM('PRIMARY SUPERVISOR', 'CO-SUPERVISOR') NULL DEFAULT NULL,
  `university_name` VARCHAR(100) NULL DEFAULT NULL,
  `challenge_solution` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`ongoing_supervision_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`ongoing_supervision_has_staff_info` (
  `ongoing_supervision_student_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`ongoing_supervision_student_id`, `staff_info_staff_id`),
  INDEX `fk_ongoing_supervision_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_ongoing_supervision_has_staff_info_ongoing_supervision1_idx` (`ongoing_supervision_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_ongoing_supervision_has_staff_info_ongoing_supervision1`
    FOREIGN KEY (`ongoing_supervision_student_id`)
    REFERENCES `academic_audit_db`.`ongoing_supervision` (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`other_outreach_programs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`other_outreach_programs` (
  `program_id` INT(11) NOT NULL AUTO_INCREMENT,
  `program_title` VARCHAR(100) NULL DEFAULT NULL,
  `date_carrriedout` DATE NULL DEFAULT NULL,
  `program_location` VARCHAR(45) NULL DEFAULT NULL,
  `total_beneficiaries` INT(11) NULL DEFAULT NULL,
  `challenge_solution` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`program_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`other_outreach_programs_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`other_outreach_programs_has_staff_info` (
  `other_outreach_programs_program_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`other_outreach_programs_program_id`, `staff_info_staff_id`),
  INDEX `fk_other_outreach_programs_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_other_outreach_programs_has_staff_info_other_outreach_pr_idx` (`other_outreach_programs_program_id` ASC) VISIBLE,
  CONSTRAINT `fk_other_outreach_programs_has_staff_info_other_outreach_prog1`
    FOREIGN KEY (`other_outreach_programs_program_id`)
    REFERENCES `academic_audit_db`.`other_outreach_programs` (`program_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`peer_reviewed_publications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`peer_reviewed_publications` (
  `publication_id` INT(11) NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(145) NULL DEFAULT NULL,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `publication_year` DATE NULL DEFAULT NULL,
  `type` ENUM('JOURNAL', 'BOOK', 'BOOK CHAPTER', 'CONFERENCE PROCEEDING') NULL DEFAULT NULL,
  `publisher` VARCHAR(100) NULL DEFAULT NULL,
  `volume_number` INT(11) NULL DEFAULT NULL,
  `ISBN` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`publication_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`peer_reviewed_publications_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`peer_reviewed_publications_has_staff_info` (
  `peer_reviewed_publications_publication_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`peer_reviewed_publications_publication_id`, `staff_info_staff_id`),
  INDEX `fk_peer_reviewed_publications_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_peer_reviewed_publications_has_staff_info_peer_reviewed__idx` (`peer_reviewed_publications_publication_id` ASC) VISIBLE,
  CONSTRAINT `fk_peer_reviewed_publications_has_staff_info_peer_reviewed_pu1`
    FOREIGN KEY (`peer_reviewed_publications_publication_id`)
    REFERENCES `academic_audit_db`.`peer_reviewed_publications` (`publication_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`positions_held`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`positions_held` (
  `position_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NULL DEFAULT NULL,
  `position` VARCHAR(45) NULL DEFAULT NULL,
  `department_id` INT(11) NULL DEFAULT NULL,
  `appointment_date` DATE NULL DEFAULT NULL,
  `last_promotion_date` DATE NULL DEFAULT NULL,
  `appraisal_recommendation` VARCHAR(100) NULL DEFAULT NULL,
  `first_appointment_date` DATE NULL DEFAULT NULL,
  `last_appraised_year` DATE NULL DEFAULT NULL,
  `comment` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  INDEX `fk_pos_staff_idx` (`staff_id` ASC) VISIBLE,
  INDEX `fk_pos_depart_idx` (`department_id` ASC) VISIBLE,
  CONSTRAINT `fk_pos_depart`
    FOREIGN KEY (`department_id`)
    REFERENCES `academic_audit_db`.`departments` (`department_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`professional_training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`professional_training` (
  `degree_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NOT NULL,
  `institution` VARCHAR(45) NULL DEFAULT NULL,
  `location` VARCHAR(45) NULL DEFAULT NULL,
  `qualifiication` VARCHAR(45) NULL DEFAULT NULL,
  `year_completion` DATE NULL DEFAULT NULL,
  `study_field` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`degree_id`, `staff_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`professional_training_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`professional_training_has_staff_info` (
  `professional_training_degree_id` INT(11) NOT NULL,
  `professional_training_staff_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`professional_training_degree_id`, `professional_training_staff_id`, `staff_info_staff_id`),
  INDEX `fk_professional_training_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_professional_training_has_staff_info_professional_traini_idx` (`professional_training_degree_id` ASC, `professional_training_staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`qualifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`qualifications` (
  `qualification_id` INT(11) NOT NULL,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`qualification_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`qualifications_has_degrees_obtained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`qualifications_has_degrees_obtained` (
  `Qualifications_qualification_id` INT(11) NOT NULL,
  `degrees_obtained_degree_id` INT(11) NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `degrees_obtained_degree_id`),
  INDEX `fk_Qualifications_has_degrees_obtained_degrees_obtained1_idx` (`degrees_obtained_degree_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_degrees_obtained_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_degrees_obtained_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `academic_audit_db`.`qualifications` (`qualification_id`),
  CONSTRAINT `fk_Qualifications_has_degrees_obtained_degrees_obtained1`
    FOREIGN KEY (`degrees_obtained_degree_id`)
    REFERENCES `academic_audit_db`.`degrees_obtained` (`degree_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`qualifications_has_on_going_degrees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`qualifications_has_on_going_degrees` (
  `Qualifications_qualification_id` INT(11) NOT NULL,
  `on_going_degrees_ongoing_degree_id` INT(11) NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `on_going_degrees_ongoing_degree_id`),
  INDEX `fk_Qualifications_has_on_going_degrees_on_going_degrees1_idx` (`on_going_degrees_ongoing_degree_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_on_going_degrees_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_on_going_degrees_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `academic_audit_db`.`qualifications` (`qualification_id`),
  CONSTRAINT `fk_Qualifications_has_on_going_degrees_on_going_degrees1`
    FOREIGN KEY (`on_going_degrees_ongoing_degree_id`)
    REFERENCES `academic_audit_db`.`on_going_degrees` (`ongoing_degree_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`qualifications_has_professional_training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`qualifications_has_professional_training` (
  `Qualifications_qualification_id` INT(11) NOT NULL,
  `professional_training_degree_id` INT(11) NOT NULL,
  `professional_training_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`Qualifications_qualification_id`, `professional_training_degree_id`, `professional_training_staff_id`),
  INDEX `fk_Qualifications_has_professional_training_professional_tr_idx` (`professional_training_degree_id` ASC, `professional_training_staff_id` ASC) VISIBLE,
  INDEX `fk_Qualifications_has_professional_training_Qualifications1_idx` (`Qualifications_qualification_id` ASC) VISIBLE,
  CONSTRAINT `fk_Qualifications_has_professional_training_Qualifications1`
    FOREIGN KEY (`Qualifications_qualification_id`)
    REFERENCES `academic_audit_db`.`qualifications` (`qualification_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`rank_research_teaching_env`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`rank_research_teaching_env` (
  `rank_id` INT(11) NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(100) NULL DEFAULT NULL,
  `item` VARCHAR(100) NULL DEFAULT NULL,
  `qaulity` INT(11) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `remarks` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`rank_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`rank_research_teaching_env_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`rank_research_teaching_env_has_staff_info` (
  `rank_research_teaching_env_rank_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`rank_research_teaching_env_rank_id`, `staff_info_staff_id`),
  INDEX `fk_rank_research_teaching_env_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_rank_research_teaching_env_has_staff_info_rank_research__idx` (`rank_research_teaching_env_rank_id` ASC) VISIBLE,
  CONSTRAINT `fk_rank_research_teaching_env_has_staff_info_rank_research_te1`
    FOREIGN KEY (`rank_research_teaching_env_rank_id`)
    REFERENCES `academic_audit_db`.`rank_research_teaching_env` (`rank_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`research_collaborators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`research_collaborators` (
  `collab_id` INT(11) NOT NULL AUTO_INCREMENT,
  `colab_name` VARCHAR(100) NULL DEFAULT NULL,
  `affiliation` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`collab_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`research_collaborators_has_on_going_research`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`research_collaborators_has_on_going_research` (
  `research_collaborators_collab_id` INT(11) NOT NULL,
  `on_going_research_research_id` INT(11) NOT NULL,
  PRIMARY KEY (`research_collaborators_collab_id`, `on_going_research_research_id`),
  INDEX `fk_research_collaborators_has_on_going_research_on_going_re_idx` (`on_going_research_research_id` ASC) VISIBLE,
  INDEX `fk_research_collaborators_has_on_going_research_research_co_idx` (`research_collaborators_collab_id` ASC) VISIBLE,
  CONSTRAINT `fk_research_collaborators_has_on_going_research_on_going_rese1`
    FOREIGN KEY (`on_going_research_research_id`)
    REFERENCES `academic_audit_db`.`on_going_research` (`research_id`),
  CONSTRAINT `fk_research_collaborators_has_on_going_research_research_coll1`
    FOREIGN KEY (`research_collaborators_collab_id`)
    REFERENCES `academic_audit_db`.`research_collaborators` (`collab_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`scientific_communications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`scientific_communications` (
  `com_id` INT(11) NOT NULL AUTO_INCREMENT,
  `staff_id` INT(11) NOT NULL,
  `platform_name` VARCHAR(45) NULL DEFAULT NULL,
  `com_date` DATE NULL DEFAULT NULL,
  `topic` VARCHAR(45) NULL DEFAULT NULL,
  `challenge_solutions` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`com_id`, `staff_id`),
  INDEX `fk_com_staff_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`sessions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`sessions` (
  `session_id` INT(11) NOT NULL,
  `staff_id` INT(11) NULL DEFAULT NULL,
  `login_datetime` DATETIME NULL DEFAULT NULL,
  `logout_datetime` DATETIME NULL DEFAULT NULL,
  `session_log` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  INDEX `fk_session_staff_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`staff_info` (
  `staff_id` INT(11) NOT NULL,
  `fname` VARCHAR(45) NULL DEFAULT NULL,
  `lname` VARCHAR(45) NULL DEFAULT NULL,
  `gender` ENUM('MALE', 'FEMALE') NULL DEFAULT NULL,
  `date_birth` DATE NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `tel` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`supervisions_completed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`supervisions_completed` (
  `student_id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_fname` VARCHAR(45) NULL DEFAULT NULL,
  `student_lname` VARCHAR(45) NULL DEFAULT NULL,
  `research_title` VARCHAR(100) NULL DEFAULT NULL,
  `start_year` DATE NULL DEFAULT NULL,
  `completion_year` DATE NULL DEFAULT NULL,
  `nature_supervision` ENUM('PRIMARY SUPERVISOR', 'CO-SUPERVISOR') NULL DEFAULT NULL,
  `awarding_university` VARCHAR(100) NULL DEFAULT NULL,
  `challenge_solution` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`supervisions_completed_has_staff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`supervisions_completed_has_staff_info` (
  `supervisions_completed_student_id` INT(11) NOT NULL,
  `staff_info_staff_id` INT(11) NOT NULL,
  PRIMARY KEY (`supervisions_completed_student_id`, `staff_info_staff_id`),
  INDEX `fk_supervisions_completed_has_staff_info_staff_info1_idx` (`staff_info_staff_id` ASC) VISIBLE,
  INDEX `fk_supervisions_completed_has_staff_info_supervisions_compl_idx` (`supervisions_completed_student_id` ASC) VISIBLE,
  CONSTRAINT `fk_supervisions_completed_has_staff_info_supervisions_complet1`
    FOREIGN KEY (`supervisions_completed_student_id`)
    REFERENCES `academic_audit_db`.`supervisions_completed` (`student_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `academic_audit_db`.`chal_sol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academic_audit_db`.`chal_sol` (
  `chal_sol_id` INT NOT NULL AUTO_INCREMENT,
  `staff_id` INT NULL,
  `challenge` VARCHAR(150) NULL,
  `solution` VARCHAR(150) NULL,
  `source` VARCHAR(45) NULL,
  PRIMARY KEY (`chal_sol_id`),
  INDEX `fk_chal_so_staffl_idx` (`staff_id` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
