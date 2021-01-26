<?php

require __DIR__ . '/vendor/autoload.php';
    
# Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;



class storage{

private $projectId;
private $storage;

 public function __construct(){

    putenv("GOOGLE_APPLICATION_CREDENTIALS=credentials\\marketstorage-96d6e00a4807.json");
    $this->projectId = 'marketstorage';
    
    # Instantiates a client
    $this->storage = new StorageClient([
        'projectId' =>  $this->projectId
    ]);
}
    
public function createBucket($bucketName){
  

    # Creates the new bucket
    $bucket = $this->storage->createBucket($bucketName);
    
    echo 'Bucket ' . $bucket->name() . ' created.';

}

public function listBuckets(){
    $buckets = $this->storage->buckets();
    foreach($buckets as $bucket){
        echo $bucket->name().PHP_EOL;
    }

}

function uploadObject($bucketName, $objectName, $source)
{
    $file = fopen($source, 'r');
    $bucket = $this->storage->bucket($bucketName);
    $object = $bucket->upload($file, [
        'name' => $objectName
    ]);
   /*  printf('Uploaded %s to gs://%s/%s' . PHP_EOL, basename($source), $bucketName, $objectName); */
   return true;
}

function deleteObject($bucketName, $objectName, $options = [])
{
 
    $bucket = $this->storage->bucket($bucketName);
    $object = $bucket->object($objectName);
    $object->delete();
    /* printf('Deleted gs://%s/%s' . PHP_EOL, $bucketName, $objectName); */
}



}

















?>