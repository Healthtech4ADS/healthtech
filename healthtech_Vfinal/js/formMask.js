function adicionarTracoCEP(input) {
    if (input.value.length === 5) {
      input.value += "-";
    }
  }
  
  function adicionarPontoCPF(input) {
    if (input.value.length === 3 || input.value.length === 7) {
      input.value += ".";
    } else if (input.value.length === 11) {
      input.value += "-";
    }
  }
  
  function adicionarParentesesTelefone(input) {
    if (input.value.length === 1) {
      input.value = "(" + input.value;
    } else if (input.value.length === 3) {
      input.value += ") ";
    } else if (input.value.length === 10) {
      input.value += "-";
    }
  }

  
  function adicionarBarraData(input) {
    if (input.value.length === 2 || input.value.length === 5) {
      input.value += "/";
    }
  }
