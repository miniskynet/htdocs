<?php
class StudentsLookup{
    public static function getStudentsAboveMark($mark)
    {
        $studentData = [
            'Samwise Gamgee' => 88,
            'Frodo Baggins' => 56,
            'Elrond Half-Elven' => 92,
            'Gandalf Mithrandir' => 35,
            'Merry Brandybuck' => 41,
            'Pippin Took' => 25,
            'Legolas Greenleaf' => 67,
        ];

        $result = [];
        foreach ($studentData as $student => $studentMark){
            if($studentMark >= $mark){
                $result[] = "$student: $studentMark";
            }
        }

        return $result;
    }
}
