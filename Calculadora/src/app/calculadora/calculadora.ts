import { Component, signal } from '@angular/core';


@Component({

  selector: 'app-calculadora',
  styleUrl: './calculadora.css',
  templateUrl: './calculadora.html',
})
export class Calculadora {
  readonly a = signal(0);
  readonly b = signal(0);
  readonly resultado = signal(0);

  sumar(): void {
    this.resultado.set(Number(this.a()) + Number(this.b()));
  }
}
