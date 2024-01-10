function sendForm(form, requestLink) {
    const formData = new FormData(form);
    const filteredFormData = new FormData();

    formData.forEach((value, key) => {
        if (value.trim()) {
            filteredFormData.append(key, value);
        }
    });

    return $.ajax({
        type: "POST",
        url: requestLink,
        data: filteredFormData,
        processData: false,
        contentType: false
    });
}
