import * as axios from 'axios';

const BASE_URL = 'http://localhost:8000';

function upload(formData) {

     axios.post(url, formData)
          .then(x => x.data)
          .then(x => x.map(img => Object.assign({},
               img, {
                    url: `${BASE_URL}/images/${img.id}`
               }
          )));
}

export {upload}
