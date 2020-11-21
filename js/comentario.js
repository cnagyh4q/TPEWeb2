let app = new Vue({
  el: "#vue-comentarios",
  data: {
    comentarios: [],
  },
  methods: {
    // notificar si esta seguro que quiere eliminar
    eliminar: function (id) {
      alert(id);
      eliminarComentario(id);
    },
  },
});

const api = "api/comentarios";

document.addEventListener("DOMContentLoaded", () => {
  const id = document.querySelector(".detalleContent").id;
  getComentarios(id);

  document.querySelector("#add-comentar").addEventListener("submit", (e) => {
    e.preventDefault();
    const comentario = {
      comentario: document.querySelector('input[name="comentario"]').value,
      puntaje: document.querySelector('select[name="puntaje"]').value,
    };

    agregarComentario(id, comentario);
    document.querySelector("#add-comentar").reset();
  });
});

function getComentarios(id) {
  fetch(`${api}/${id}`)
    .then((response) => response.json())
    .then((comentarios) => (app.comentarios = comentarios))
    .catch((e) => console.error(e));
}

function agregarComentario(id, comentario) {
  fetch(`${api}/${id}`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(comentario),
  })
    .then((response) => {
      if (!response.ok) {
        throw "Error al agregar comentario";
      }
      return response.json();
    })
    .then((c) => app.comentarios.push(c))
    .catch((e) => console.error(e));
}

function eliminarComentario(id) {
    fetch(`${api}/${id}`, {
    method: "DELETE",
  })
    .then((response) => response.json())
    .then( ()=> {

      let elementoAEliminar = "";
      for (let element of app.comentarios) {
          if (element.id === id) {
              elementoAEliminar = element;
  
          }
  
      }
  
      app.comentarios.splice(app.comentarios.indexOf(elementoAEliminar), 1);


    })
    .catch((e) => console.error(e));
}
