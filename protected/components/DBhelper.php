<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBhelper
 *
 * @author ron
 */
class DBhelper {
    //put your code here
    
    public static function getSchoolIdFromDpt($id)
    {
        return Department::model()->findByPk($id)->schoolID;
    }
    
    public static function getDepartmentIdFromPro($id)
    {
        return Programme::model()->findByPk($id)->departmentID;
    }
    
    
    
    public static function getDepartmentNameById($id)
    {
            
                $data = Department::model()->findByPk($id)->dpt_name;
                
                if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $data;
    }

    
    public static function getSchoolNameById($id)
    {
            
                $school = School::model()->findByPk($id)->sch_name;
                
                if($school===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $school;
    }
        
    
    public static function getProgrammeNameById($id)
    {
        
        $data =  Programme::model()->findByPk($id)->pro_name;
                
                if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $data;
        
        
    }
    
    public static function getAcademicYearByBatch($batch,$programme)
    {
        
        $model=Batch::model()->findByPk(array('batchName'=>$batch,'programmeCode'=>$programme));
        
        $data =FormUtil::getTerm($model->bat_term)." ".$model->bat_year;
                if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $data;
        
        
    }
        
        
        
    public static function getFullNameByPersonID($id)
    {
        $model = Person::model()->findByPk($id);
        
        return  $model->per_title." ".$model->per_firstName." ".$model->per_lastName;
    }
        
        
        
        
        
        
        
        
        
}

?>
