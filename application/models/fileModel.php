<?php
class FileModel extends CI_Model
{
    
    public function getFiles()
    {
        $this->load->database();
        $this->db->where('file_active', 1);
        $imports = $this->db->get('imports')->result();
        
        return $imports;
    }
    
    public function setInactive($id)
    {
        $this->load->database();
        $this->db->set('file_active', 0);
        $this->db->where('id', $id);
        $this->db->update('imports');
    }

    public function getInactiveFiles()
    {
        $this->load->database();
        $this->db->where('file_active', 0);
        $imports = $this->db->get('imports')->result();
        
        return $imports;
    }
    
    public function deleteFile($id)
    {
        $this->load->database(); 
        $this->db->delete('imports', array('id' => $id));        
    }

    public function setActive($id)
    {
        $this->load->database();
        $this->db->set('file_active', 1);
        $this->db->where('id', $id);
        $this->db->update('imports');
    }
}
