function popUp(title,message,status){
    return Swal.fire({
      title: title,
      icon: status,
      html: message,
      confirmButtonText:'Tamam',
    
    })
  
  }
  
  function showError(title,message){
    return Swal.fire({
      title: title,
      icon: 'error',
      html: message,
      showCancelButton: true,
      confirmButtonText:'Tamam',
      cancelButtonText:'Kapat',
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
    })
  }
  